<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
//        'App\Http\Controllers\instaController@test',
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')
        //          ->hourly();

//        $schedule->call('App\Http\Controllers\instaController@test')->everyMinute();

        $schedule->call(function(){
//            app('App\Http\Controllers\instaController')->test();
//            return app('App\Http\Controllers\instaController')->test();
//            syslog(1, 'test');
            $myfile = fopen("newfile.txt", "a");
            $txt = "John Doe\n";
            fwrite($myfile, $txt);
            fclose($myfile);
        })->everyMinute();

//        $schedule->call('inspire')
//            ->hourly()->dailyAt('23:30');

//        ->withoutOverlapping();
//        ->daily();
//        ->twiceDaily(1, 13);
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
