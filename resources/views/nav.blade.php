<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">Weather Forecast</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link  {{ Route::currentRouteName()=='home' ? 'active text-warning fw-bold' : '' }}" aria-current="page" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link
                    {{ Route::currentRouteName()=='area' ? 'active text-warning fw-bold' : '' }}
                    {{ Route::currentRouteName()=='weather_forecast_data_city' ? 'active text-warning fw-bold' : '' }}
                    {{ Route::currentRouteName()=='air_forecast_data_city' ? 'active text-warning fw-bold' : '' }}
                    " aria-current="page" href="{{ route('area') }}">Area Weather Forecast</a>
                </li>
{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link {{ Route::currentRouteName()=='home' ? 'active' : '' }}" href="#">Pricing</a>--}}
{{--                </li>--}}
            </ul>
{{--            <span class="navbar-text">--}}
{{--        Navbar text with an inline element--}}
{{--      </span>--}}
        </div>
    </div>
</nav>
