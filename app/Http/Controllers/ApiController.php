<?php

namespace App\Http\Controllers;

use App\Models\Api;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
class ApiController extends Controller
{
    public function getWeather(Request $request)
    {
        $bangladeshCities = [
            'Bandarban',
            'Barisal',
            'Bhola',
            'Bogra',
            'Brahmanbaria',
            'Chandpur',
            'Chittagong',
            'Comilla',
            'Cox\'s Bazar',
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
//        $apiKey = config('app.openweather_api_key');
//        $cityname = $request->input('city');
//        $city = urlencode($cityname);
        foreach ($bangladeshCities as $city){
            $apiKey = config('app.openweather_api_key');
            $citys = urlencode($city);
            $url = "https://api.openweathermap.org/data/2.5/weather?q=$citys&appid=$apiKey&units=metric";

            $response = Http::get($url);

            // Save weather data to the database
            Api::create([
                'city' => $city,
                'data' => $response,
            ]);
        }

        return $response->json();
    }

    public function Weatherforecast(Request $request)
    {
        $bangladeshCities = [
            'Bandarban',
            'Barisal',
            'Bhola',
            'Bogra',
            'Brahmanbaria',
            'Chandpur',
            'Chittagong',
            'Comilla',
            'Cox\'s Bazar',
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
//        $apiKey = config('app.openweather_api_key');
//        $cityname = $request->input('city');
//        $city = urlencode($cityname);
//        foreach ($bangladeshCities as $city){
            $apiKey = config('app.openweather_api_key');
            //$citys = urlencode($city);
            $url = "https://api.openweathermap.org/data/2.5/forecast/?q=dhaka&cnt=2&appid=$apiKey&units=metric";
            $response = Http::get($url);
            //$datadecode[]=json_decode($response);

        $apiResponse = json_decode($response); // Replace with your API response
        //$weatherData = collect($apiResponse);

        // Group the weather data by city name
        //$groupedWeatherData = $weatherData->groupBy('city.name');

        foreach ($apiResponse as $cityData) {

                $cityName[] = $cityData['city']['name'];

            }
//
//            if (isset($cityData['list'])) {
//                foreach ($cityData['list'] as $weather) {
//                    if (isset($weather['main']['temp'])) {
//                        $temperature = $weather['main']['temp'];
//                    }
//                    // Handle other data points similarly
//                }
//            }

        return $cityName;


        //return response()->json($data);
    }

    public function weatherdata(){
        try {

            $api=Api::orderBy('id','desc')->get(['data','city','created_at']);

            foreach ($api as $apidata){
                $datadecode=json_decode($apidata->data);
                $data[]=[
                    'city'=>$apidata->city,
                    'lon'=>$datadecode->coord->lon,
                    'lat'=>$datadecode->coord->lat,
                    'Weather'=>$datadecode->weather[0]->main,
                    'Weather details'=>$datadecode->weather[0]->description,
                    'Curr. Temp'=>$datadecode->main->temp,
                    'Feel Temp'=>$datadecode->main->feels_like,
                    'Hum'=>$datadecode->main->humidity ,
                    'Time'=>Carbon::parse($apidata->created_at)->format('Y-m-d H:i:s') ,
                ];
            }

            return response()->json($data);
        }
        catch (\Exception $exception){
            return $exception->getMessage();
        }


    }
}
