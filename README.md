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

Welcome to the Laravel 9 Weather & Air Forecasting App – your gateway to accurate weather and air quality predictions, all powered by the popular PHP framework, Laravel. Our application brings you real-time weather and air quality forecasts, catering to users worldwide. Whether you're planning your day, staying vigilant about air quality, or simply indulging your curiosity, our app provides the essential information you're looking for. Follow these steps to get started:

### Step 1 : Clone the Git Project

Clone the repository by executing the following command in your terminal:
```
git clone https://github.com/sanwarhossainkhan/laravel-python.git

```

### Step 2 : Navigate to the Project Directory

Change to the project directory using the command:
```
cd laravel-python

```

### Step 3 : Install Dependencies with Composer

Run the following command to install project dependencies using Composer:
```
Composer install
```

### Step 4 : Configure Your Environment

--Duplicate the .env.example file in the root directory and rename it to .env.
--In the .env file, replace api_key with your actual OpenWeatherMap API key. To obtain an API key, sign up at https://openweathermap.org/api.

### Step 5 : Update the Configuration

In the config/app.php file, find the 'openweather_api_key' line and ensure it corresponds to:
```
'openweather_api_key' => env('OPENWEATHER_API_KEY'),

```

### Step 6 :  Run Database Migrations

Set up your database configuration in the .env file, and then execute the migration to set up the required database tables:
```
php artisan migrate
```

### Step 7 :  Schedule Periodic Updates

To regularly fetch updated forecasts, run the scheduling command:
```
php artisan schedule:run

```
Remember, scheduling this command periodically (e.g., via a cron job) ensures your forecasts stay current.

### Step 8 :  Access the Application

Start a development server by running:
```
php artisan serve

```
You can now access the app through your web browser at http://127.0.0.1:8000/.

### Step 9 :  App Features

Upon accessing the app, you'll have access to the following features:

**Current Weather Status: Get up-to-date information about the current weather.
**Weather Forecasting: View detailed weather forecasts, including temperature, humidity, and more.
**Air Forecasting: Stay informed about air quality levels in your area.

###  Customizing City List

If you want to customize the list of cities, locate the $bangladeshCities array in the Apicontroller.php file. Add or modify city names according to your preferences.

```
protected $bangladeshCities = [
        'Bandarban',
        'Barisal',
        'Bhola',
        'Bogra',];
```

## Troubleshooting

Should you encounter any issues during setup, refer to the app's issue tracker or reach out to our support for assistance.

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

