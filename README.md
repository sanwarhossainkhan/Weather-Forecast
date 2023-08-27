<p align="center"/><a href="https://laravel.com" target="_blank">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400">
</a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Laravel 9 Weather & Air Forecasting

Welcome to the Laravel 9 Weather & Air Forecasting App, where accurate weather and air quality predictions are just a click away. Our application harnesses the power of Laravel, a popular PHP framework, to deliver real-time weather and air quality forecasts to users around the world. Whether you're planning a trip, staying informed about air quality, or just curious about the weather, our app provides you with the information you need.
Here's a step-by-step guide & command:

### Step 1 : Clone git project
```
git clone https://github.com/sanwarhossainkhan/laravel-python.git
```
### Step 2 : Goto Project directory
```
cd .\laravel-python\
```

### Step 3 : Composer install
```
Composer install
```

### Step 4 : Rename .env file & add this

```
OPENWEATHER_API_KEY=api_key
```
goto https://openweathermap.org/api signup and generate free api key. 

### Step 5 :  Add this code config/app.php file 

```
'openweather_api_key' => env('OPENWEATHER_API_KEY'),
```

### Step 6 :  Migrate

```
php artisan migrate
```

### Step 7 :  Schedule run

```
php artisan schedule:run 
```

### Step 8 :  Check this url

```
http://127.0.0.1:8000/
```

### Step 9 :  Output

--Current Weather Status.
--Weather Forecasting.
--Air Forecasting.

###  You can set any Country Wise City weather

change Apicontroller.php file array list. just add your city list in this $bangladeshCities = []

```
protected $bangladeshCities = [
        'Bandarban',
        'Barisal',
        'Bhola',
        'Bogra',];
```

## Contributing

Welcome to the Laravel 9 Weather & Air Forecasting project! We appreciate your interest in contributing to our project. By contributing, you're helping us improve the app and provide better weather and air quality forecasts to users around the world. Whether you're a developer, designer, tester, or just passionate about weather data, there are many ways you can contribute.

### How to Contribute

1. **Fork the Repository:** Start by forking this repository to your GitHub account. This will create a copy of the project that you can work on.

2. **Clone the Fork:** Clone the forked repository to your local machine using the `git clone` command. Replace `{username}` with your GitHub username:

   ```bash
   git clone https://github.com/{username}/laravel-weather-forecast.git
   cd laravel-weather-forecast


## Code of Conduct

We, the contributors and maintainers of the Laravel 9 Weather & Air Forecasting project, are committed to creating a welcoming and respectful community for everyone. Our project follows the guidelines outlined in this Code of Conduct to ensure a positive experience for all participants. By participating in this project, you agree to abide by these guidelines.

### Our Pledge

In the interest of fostering an open and inclusive environment, we pledge to:

- Be respectful and considerate towards others.
- Welcome individuals from all backgrounds and experiences.
- Value diverse perspectives and ideas.
- Address conflicts constructively and resolve disagreements respectfully.

### Expected Behavior

All project participants are expected to:

- Be courteous, kind, and empathetic in interactions.
- Use inclusive language and respect differing opinions.
- Be open to constructive feedback and willing to learn and grow.
- Focus on the content of discussions and avoid personal attacks or insults.

### Unacceptable Behavior

Unacceptable behavior includes, but is not limited to:

- Harassment, intimidation, or discrimination based on race, gender, sexual orientation, religion, or any other personal characteristic.
- Offensive comments, derogatory language, or trolling.
- Publishing others' private information without permission.
- Disruptive behavior or unwelcome advances.

### Reporting Incidents

If you experience or witness unacceptable behavior, please report it by contacting the project maintainers at [sanowar.khan@live.com](mailto:sanowar.khan@live.com). All reports will be kept confidential and will be promptly reviewed and addressed.

### Enforcement

In cases where a participant violates this Code of Conduct, appropriate actions will be taken, which may include warnings, temporary or permanent bans from project participation, or other actions as deemed necessary by the project maintainers.

### Our Responsibility

The project maintainers are responsible for clarifying and enforcing our Code of Conduct. They have the right and responsibility to remove, edit, or reject comments, code, or other contributions that do not align with this Code of Conduct.

### Acknowledgment

By participating in this project, you agree to abide by this Code of Conduct and help create a safe and positive experience for all community members.

Thank you for contributing to the Laravel 9 Weather & Air Forecasting project and helping us maintain a respectful and inclusive community.

