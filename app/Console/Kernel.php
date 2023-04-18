<?php

namespace App\Console;

use App\Console\Commands\FetchDataCommand;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
	/**
	 * Define the application's command schedule.
	 */
	protected function schedule(Schedule $schedule): void
	{
		$schedule->command('app:fetch-data-command')->everyMinute();
		$schedule->command('auth:clear-resets')->everyFifteenMinutes();
	}

	protected $commands = [
		FetchDataCommand::class,
	];

	/**
	 * Register the commands for the application.
	 */
	protected function commands(): void
	{
		$this->load(__DIR__ . '/Commands');

		require base_path('routes/console.php');
	}
}
