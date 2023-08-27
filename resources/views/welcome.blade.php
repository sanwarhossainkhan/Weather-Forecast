@extends('layout')
@section('title','Current Weather')
@section('content')
    @php
        use Carbon\Carbon;
    @endphp
    <div class="row">
        <div class="col-md-12">
            <div class="text-center fs-1"> Today Weather <span class="text-muted fs-5" id="clock">  </span></div>
        </div>
    </div>
<div class="row">
    @foreach($api as $apidata)
        @php  $datadecode=json_decode($apidata->data); @endphp
        <div class="col-md-3">
{{--            <a href="{{ route('weather_forecast_data_city',[$apidata->city]) }}" style="text-decoration: none;color: #1a202c">--}}
            <div class="card mb-3 shadow-sm p-2 mb-5 bg-body rounded" style="max-width: 26rem;">
                <div class="card-header fw-bolder fs-4 d-flex justify-content-between">
                    <div>{{ $apidata->city }}</div>
                    <div><i class="fa-solid fa-temperature-three-quarters"></i> {{ round($datadecode->main->temp) }}</div>
                </div>
                <div class="card-body">
                    <h5 class="card-title text-center">{{ $datadecode->weather[0]->main }}</h5>
                    <div class="card-text d-flex justify-content-between">
                        <div data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Current High Temp."><i class="fa-solid fa-temperature-arrow-up text-danger"></i> {{ round($datadecode->main->temp_max) }} </div>
{{--                        <div data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Current Low Temp."><i class="fa-solid fa-temperature-low text-warning"></i> {{ round($datadecode->main->temp_min) }} </div>--}}
                        <div data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Current Feel Temp."><i class="fa-solid fa-temperature-half text-success"></i> {{ round($datadecode->main->feels_like) }} </div>
                        <div data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Current Humidity"><i class="fa-solid fa-snowflake text-primary"></i> {{ round($datadecode->main->humidity) }} </div>
                        <div data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Current Wind Speed"><i class="fa-solid fa-wind" style="color: orange"></i> {{ round($datadecode->wind->speed) }} </div>
                    </div>
                    <div class="text-center mt-3 fs-6 text-muted"><i class="fa-solid fa-clock"></i> {{ Carbon::createFromTimestamp($datadecode->dt)->format('d-m-Y h:i A') }}</div>


                </div>
                <div class="card-footer text-muted">
                    <div class="card-text">
                        <div class="float-start"><a href="{{ route('weather_forecast_data_city',[$apidata->city]) }}" style="text-decoration: none;" class="text-success"> <i class="fa-solid fa-cloud-sun fs-4"></i> Forecast</a></div>
                        <div class="float-end"><a href="{{ route('air_forecast_data_city',[$apidata->city]) }}" style="text-decoration: none;" class="text-danger"> <i class="fa-solid fa-wind fs-4"></i> Forecast</a></div>
                    </div>
                </div>
            </div>
{{--            </a>--}}
        </div>
    @endforeach

</div>


<div class="row fixed-bottom">
    <div class="col-md-12 text-center text-bg-dark text-white-50">Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})</div>
</div>
@endsection
