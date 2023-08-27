@extends('layout')
@section('title','Air forecast')
@section('content')
<div class="row">
    @php
        use Carbon\Carbon;
    @endphp
    <div class="col-md-12">
        <div class="card mb-3 shadow-sm p-2 mb-5 bg-body rounded">
            <div class="card-header fw-bolder fs-4 d-flex justify-content-center">
                <div>{{ $id }} Air Forecast</div>
            </div>
            <div class="card-body">
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th scope="col"><i class="fa-solid fa-clock"></i>Date</th>
                <th scope="col">Air Quality</th>
                <th scope="col">CO</th>
                <th scope="col">NO</th>
                <th scope="col">NO<Sub>2</Sub></th>
                <th scope="col">O<sub>3</sub></th>
                <th scope="col">SO<sub>2</sub></th>
                <th scope="col">PM<sub>2.5</sub></th>
                <th scope="col">PM<sub>10</sub></th>
                <th scope="col">NH<sub>3</sub></th>
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
                        $formattedDateTime = $cityData->dt;
                        if($cityData->main->aqi==1){
                                            $airque="Good";
                                        }
                                        elseif($cityData->main->aqi==2){
                                            $airque="Fair";
                                        }
                                        elseif($cityData->main->aqi==3){
                                            $airque="Moderate";
                                        }
                                        elseif($cityData->main->aqi==4){
                                            $airque="Poor";
                                        }
                                        else{
                                            $airque="Very Poor";
                                        }
                    @endphp


                    @if (!in_array($formattedDateTime,$prevFormattedDateTime) )
                        <tr>
                            <td>{{ Carbon::createFromTimestamp($cityData->dt)->format('Y-m-d h:i A') }}</td>
                            <td>{{ $airque  }}</td>
                            <td>{{ $cityData->components->co }}</td>
                            <td>{{ $cityData->components->no }}</td>
                            <td>{{ $cityData->components->no2 }}</td>
                            <td>{{ $cityData->components->o3 }}</td>
                            <td>{{ $cityData->components->so2 }}</td>
                            <td>{{ $cityData->components->pm2_5 }}</td>
                            <td>{{ $cityData->components->pm10 }}</td>
                            <td>{{ $cityData->components->nh3 }}</td>
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
