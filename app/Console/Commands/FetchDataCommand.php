<?php

namespace App\Console\Commands;

use App\Models\Country;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class FetchDataCommand extends Command
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'app:fetch-data-command';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Fetch countries data';

	/**
	 * Execute the console command.
	 */
	public function handle()
	{
		// Delete all records from the `statistics` table
		DB::table('countries')->delete();
		$body = Http::get('https://devtest.ge/countries')->body();
		$data = json_decode($body, true);
		foreach ($data as $countryData) {
			$code = $countryData['code'];
			$name = [
				'en' => $countryData['name']['en'],
				'ka' => $countryData['name']['ka'],
			];
			$body = Http::post('https://devtest.ge/get-country-statistics', ['code' => $code]);
			$data = json_decode($body, true);
			$country = Country::create([
				'code'      => $code,
				'name'      => $name,
				'confirmed' => $data['confirmed'],
				'recovered' => $data['recovered'],
				'deaths'    => $data['deaths'],
			]);
		}

		$this->info('Data fetched and saved successfully!');
		return 0;
	}
}
