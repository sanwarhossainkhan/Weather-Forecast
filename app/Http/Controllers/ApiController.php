<?php

namespace App\Http\Controllers;

use App\Models\AirForecast;
use App\Models\Api;
use App\Models\Forecast;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
class ApiController extends Controller
{
    protected $bangladeshCities = [
        'Bandarban',
        'Barisal',
        'Bhola',
        'Bogra',
        'Brahmanbaria',
        'Chandpur',
        'Chittagong',
        'Comilla',
        'Coxs Bazar',
        'Dhaka',
        'Dinajpur',
        'Faridpur',
        'Feni',
        'Gaibandha',
        'Gazipur',
        'Gopalganj',
        'Habiganj',
        'Jamalpur',
        'Jessore',
        'Jhenaidah',
        'Joypurhat',
        'Khulna',
        'Kishoreganj',
        'Kurigram',
        'Kushtia',
        'Lakshmipur',
        'Lalmonirhat',
        'Madaripur',
        'Magura',
        'Manikganj',
        'Moulvibazar',
        'Munshiganj',
        'Mymensingh',
        'Naogaon',
        'Narail',
        'Narayanganj',
        'Narsingdi',
        'Nawabganj',
        'Netrokona',
        'Nilphamari',
        'Pabna',
        'Panchagarh',
        'Patuakhali',
        'Pirojpur',
        'Rajbari',
        'Rajshahi',
        'Rangpur',
        'Satkhira',
        'Shariatpur',
        'Sherpur',
        'Sirajganj',
        'Sylhet',
        'Tangail',
        'Thakurgaon'
    ];
    protected $apiKey;

    public function __construct()
    {
        $this->apiKey=config('app.openweather_api_key');
    }

    public function getWeather(Request $request)
    {
        try {
            foreach ($this->bangladeshCities as $city){
                $citys = urlencode($city);

                $url = "https://api.openweathermap.org/data/2.5/weather?q=$citys&appid={$this->apiKey}&units=metric";

                $response = Http::get($url);

                Api::updateOrCreate([
                    'city' => $city],
                    ['city' => $city, 'data' => $response,]);
            }

            return $response->json();
        }
        catch (\Exception $exception){
            return $exception->getMessage();
        }

    }

    public function Weatherforecast(Request $request)
    {
        try {
            foreach ($this->bangladeshCities as $city) {
                $citys = urlencode($city);
                $url = "https://api.openweathermap.org/data/2.5/forecast/?q=$citys&cnt=40&appid={$this->apiKey}&units=metric";
                $response = Http::get($url);

                Forecast::create([
                    'city' => $city,
                    'data' => $response,
                ]);
            }

            return $response->json();
        }
        catch (\Exception $exception){
            return $exception->getMessage();
        }

    }

    public function weatherdata(){
        try {

            $api=Api::get(['data','city','created_at']);
            return view('welcome',compact('api'));
        }
        catch (\Exception $exception){
            return $exception->getMessage();
        }


    }

    public function weather_data_api(){
        try {

            $api=Api::get(['data','city','created_at']);

            foreach ($api as $api_data){
                $data_decode=json_decode($api_data->data);
                $data[]=[
                    'city'=>$api_data->city,
                    'lon'=>$data_decode->coord->lon,
                    'lat'=>$data_decode->coord->lat,
                    'Weather'=>$data_decode->weather[0]->main,
                    'Weather details'=>$data_decode->weather[0]->description,
                    'Curr. Temp'=>$data_decode->main->temp,
                    'Feel Temp'=>$data_decode->main->feels_like,
                    'Hum'=>$data_decode->main->humidity,
                    'Time'=>Carbon::parse($api_data->created_at)->format('Y-m-d H:i:s')];
            }
            return response()->json($data);
        }
        catch (\Exception $exception){
            return $exception->getMessage();
        }


    }

    public function weather_forecast_data_api(){
        try {

            $api=Forecast::orderBy('id','desc')->get(['data','city','created_at']);
            $data = [];
            foreach ($api as $apidata){
                $weather =[];
                $datadecode=json_decode($apidata->data,true);

                foreach ($datadecode['list'] as $cityData) {
                    $weather[] = [
                        'date'=>$cityData['dt_txt'],
                        'temp'=>$cityData['main']['temp'],
                        'feels_like'=>$cityData['main']['feels_like'],
                        'temp_max'=>$cityData['main']['temp_max'],
                        'temp_min'=>$cityData['main']['temp_min'],
                        'humidity'=>$cityData['main']['humidity'],
                        'clouds'=>$cityData['clouds'],
                        'wind_speed'=>$cityData['wind']['speed'],
                        'visibility'=>$cityData['visibility'],
                        'weather'=>$cityData['weather'][0]['main'],
                        'weather details'=>$cityData['weather'][0]['description'],
                    ];
                }

                $data[]=[
                    'Time'=>Carbon::parse($apidata->created_at)->format('Y-m-d H:i:s') ,
                    'city_name'=>$apidata->city,
                    'cod'=>$datadecode['cod'],
                    'message'=>$datadecode['message'],
                    'forecast day'=>$datadecode['cnt'],
                    'city info' => $datadecode['city']['name'],
                    'lat' => $datadecode['city']['coord']['lat'],
                    'lon' => $datadecode['city']['coord']['lon'],
                    'population' => $datadecode['city']['population'],
                    'forecast weather' => $weather,
                ];

            }

            return response()->json($data);
        }
        catch (\Exception $exception){
            return $exception->getMessage();
        }


    }

    public function weather_forecast_data_city($id){
        try {

            $api=Forecast::where('city',$id)->orderBy('id','asc')->get(['data','city','created_at']);

            return view('weather_forecast',compact('api','id'));
        }
        catch (\Exception $exception){
            return $exception->getMessage();
        }


    }

    public function air_forecast_data_city($id){
        try {

            $api=AirForecast::where('city',$id)->orderBy('id','asc')->get(['data','city','created_at']);

            return view('air_forecast',compact('api','id'));
        }
        catch (\Exception $exception){
            return $exception->getMessage();
        }


    }

    public function airforecast(){
        try {

            foreach ($this->bangladeshCities as $city) {
                $citys = urlencode($city);
                $url = "https://api.openweathermap.org/data/2.5/forecast/?q=$citys&cnt=1&appid={$this->apiKey}&units=metric";
                $response = Http::get($url);
                $datadecode=json_decode($response,true);

                if (isset($datadecode['city']['coord']['lat'])){
                    $airurl = "https://api.openweathermap.org/data/2.5/air_pollution/forecast?lat={$datadecode['city']['coord']['lat']}&lon={$datadecode['city']['coord']['lon']}&appid={$this->apiKey}";
                    $airresponse = Http::get($airurl);

                    AirForecast::create([
                        'city' => $city,
                        'lat' => $datadecode['city']['coord']['lat'],
                        'lon' => $datadecode['city']['coord']['lon'],
                        'data' => $airresponse,
                    ]);
                }
            }
            return response()->json($airresponse);
        }
        catch (\Exception $exception){
            return $exception->getMessage();
        }


    }

    public function airforecastdata(){
        try {

            $api=AirForecast::orderBy('id','desc')->get(['data','city','lat','lon','created_at']);
            $data = [];
            foreach ($api as $apidata){
                $air =[];
                $datadecode=json_decode($apidata->data,true);

                foreach ($datadecode['list'] as $cityData) {

                    $air[] = [
                        'date'=> Carbon::createFromTimestamp($cityData['dt'])->format('Y-m-d H:i:s'),
                        'air quality'=>$cityData['main']['aqi'],
                        'Carbon monoxide'=>$cityData['components']['co'],
                        'Nitrogen monoxide'=>$cityData['components']['no'],
                        'Nitrogen dioxide'=>$cityData['components']['no2'],
                        'Ozone'=>$cityData['components']['o3'],
                        'Sulphur dioxide'=>$cityData['components']['so2'],
                        'Fine particles matter'=>$cityData['components']['pm2_5'],
                        'Coarse particulate matter'=>$cityData['components']['pm10'],
                        'Ammonia'=>$cityData['components']['nh3'],
                    ];
                }

                $data[]=[
                    'city_name'=>$apidata->city,
                    'Lat'=>$apidata->lat,
                    'Lon'=>$apidata->lon,
                    'air forecast' => $air,
                ];

            }

            return response()->json($data);
        }
        catch (\Exception $exception){
            return $exception->getMessage();
        }


    }
}
