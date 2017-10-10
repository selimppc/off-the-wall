<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Bootstrap;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        #\App\Console\Commands\Inspire::class,
        \App\Console\Commands\GetEmailQueue::class,
        \App\Console\Commands\GetPoppedMessage::class,
        \App\Console\Commands\SendEmailQueue::class,
        #\Bootstrap\ConfigureLogging::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        #$schedule->command('get:emailqueue')->hourly();
        #$schedule->command('get:poppedmessage')->hourly();
        #$schedule->command('set:emailsend')->everyMinute();
    }
}
