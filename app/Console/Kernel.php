<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        $schedule->command('backup:run')->dailyAt('15:30');
        $schedule->command('backup:run')->dailyAt('17:00');
        $schedule->command('backup:run')->dailyAt('18:30');
        $schedule->command('backup:run')->dailyAt('19:30');
        $schedule->command('backup:clean')->dailyAt('01:00');       
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
