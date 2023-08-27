@extends('layout')
@section('title','Weather forecast')
@section('content')
<div class="row">
    @php
        use Carbon\Carbon;
    @endphp
    <div class="col-md-12">
        <div class="card mb-3 shadow-sm p-2 mb-5 bg-body rounded">
            <div class="card-header fw-bolder fs-4 d-flex justify-content-center">
                <div>{{ $id }}</div>
            </div>
            <div class="card-body">
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th scope="col"><i class="fa-solid fa-clock"></i>Date</th>
                <th scope="col">Temp.</th>
                <th scope="col"><i class="fa-solid fa-temperature-high"></i> Max Temp.</th>
                <th scope="col"><i class="fa-solid fa-temperature-low"></i>Min Temp.</th>
                <th scope="col">Humidity</th>
                <th scope="col">Wind</th>
                <th scope="col">Cloud</th>
                <th scope="col">Weather</th>
                <th scope="col">Visibility</th>
            </tr>
            </thead>
            <tbody>
            @php
                $prevFormattedDateTime = [];
            @endphp
            @foreach($api as $apidata)
                @php
                   $datadecode = json_decode($apidata->data);
                @endphp

                @foreach ($datadecode->list as $cityData)
                    @php
                        $formattedDateTime = $cityData->dt_txt;
                    @endphp

                    @if (!in_array($formattedDateTime,$prevFormattedDateTime) )
                        <tr>
                            <td>{{ Carbon::parse($cityData->dt_txt)->format('Y-m-d h:i A') }}</td>
                            <td>{{ $cityData->main->temp  }}</td>
                            <td>{{ $cityData->main->temp_max }}</td>
                            <td>{{ $cityData->main->temp_min }}</td>
                            <td>{{ $cityData->main->humidity }}</td>
                            <td>{{ $cityData->wind->speed }}</td>
                            <td>{{ $cityData->clouds->all }}</td>
                            <td>{{ $cityData->weather[0]->main }}</td>
                            <td>{{ $cityData->visibility }}</td>
                        </tr>
                    @endif

                    @php
                        $prevFormattedDateTime[] = $formattedDateTime;
                    @endphp
                @endforeach
            @endforeach


            </tbody>
    </table>
        </div>
        </div>
    </div>
</div>


<div class="row fixed-bottom">
    <div class="col-md-12 text-center text-bg-dark text-white-50">Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})</div>
</div>
@endsection
