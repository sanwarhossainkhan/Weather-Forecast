<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Http\Controllers\ApiController;


class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call('App\Http\Controllers\ApiController@getWeather')
            ->everyMinute();

//        $schedule->call('App\Http\Controllers\ApiController@Weatherforecast')
//            ->dailyAt('12:01');
        $schedule->call('App\Http\Controllers\ApiController@Weatherforecast')
            ->everyMinute();

//        $schedule->call('App\Http\Controllers\ApiController@airforecast')
//            ->everySixHours();
        $schedule->call('App\Http\Controllers\ApiController@airforecast')
            ->everyMinute();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
