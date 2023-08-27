<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('welcome',[ApiController::class,'weatherdata'])->name('home');
Route::get('/',[ApiController::class,'weatherdata']);
Route::get('area',function (){
    return view('area');
})->name('area');
Route::get('data',[ApiController::class,'getWeather']);

Route::get('forecast',[ApiController::class,'Weatherforecast']);
Route::get('allforecast/{id}',[ApiController::class,'weather_forecast_data_city'])->name('weather_forecast_data_city');
Route::get('air-forecast/{id}',[ApiController::class,'air_forecast_data_city'])->name('air_forecast_data_city');
Route::get('airforecast',[ApiController::class,'airforecast']);
Route::get('airforecastdata',[ApiController::class,'airforecastdata']);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('homes');
