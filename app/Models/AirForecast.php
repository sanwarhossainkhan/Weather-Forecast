<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AirForecast extends Model
{
    use HasFactory;

    protected $table='air_forecast';
    protected $fillable=[
        'city',
        'lat',
        'lon',
        'data'
    ];
}
