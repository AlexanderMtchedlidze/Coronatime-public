<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

/**
 * @group fetch-data
 */
class FetchDataCommandTest extends TestCase
{
	use RefreshDatabase;

	public function test_data_is_saved_in_database_after_running_a_command(): void
	{
		$this->artisan('app:fetch-data-command')->expectsOutput('Data fetched and saved successfully!');
		$count = DB::table('countries')->count();
		$this->assertGreaterThan(0, $count);
	}
}
