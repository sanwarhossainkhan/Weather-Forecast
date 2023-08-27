@extends('layout')
@section('title','Area List')
@section('content')

<div class="row pt-5">
@php $api=App\Models\Api::get(['data','city','created_at']); @endphp
    @foreach($api as $apidata)
        @php  $datadecode=json_decode($apidata->data); @endphp
        <div class="col-md-3">

            <div class="card mb-3 shadow-sm p-2 mb-2 bg-body rounded" style="max-width: 26rem;">
                <div class="card-header fw-bolder fs-4 d-flex justify-content-center">
                    <div>{{ $apidata->city }}</div>
                </div>

                <div class="card-footer text-muted">
                    <div class="card-text">
                        <div class="float-start"><a href="{{ route('weather_forecast_data_city',[$apidata->city]) }}" style="text-decoration: none;" class="text-success"> <i class="fa-solid fa-cloud-sun fs-4"></i> Forecast</a></div>
                        <div class="float-end"><a href="{{ route('air_forecast_data_city',[$apidata->city]) }}" style="text-decoration: none;" class="text-danger"> <i class="fa-solid fa-wind fs-4"></i> Forecast</a></div>
                    </div>
                </div>
            </div>

        </div>
    @endforeach

</div>


<div class="row fixed-bottom">
    <div class="col-md-12 text-center text-bg-dark text-white-50">Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})</div>
</div>
@endsection
