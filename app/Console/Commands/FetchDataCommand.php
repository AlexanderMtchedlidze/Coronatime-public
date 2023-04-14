<?php

namespace App\Console\Commands;

use App\Models\Country;
use App\Models\Statistic;
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
		Statistic::truncate();
		$body = Http::get('https://devtest.ge/countries')->body();
		$data = json_decode($body, true);
		foreach ($data as $countryData) {
			$code = $countryData['code'];
			$country = Country::create([
				'code'    => $code,
				'name'    => json_encode($countryData['name']),
			]);

			$body = Http::post('https://devtest.ge/get-country-statistics', ['code' => $code]);
			$data = json_decode($body, true);
			Statistic::create([
				'country_id' => $country->id,
				'confirmed'  => $data['confirmed'],
				'recovered'  => $data['recovered'],
				'deaths'     => $data['deaths'],
			]);
		}

		$this->info('Data fetched and saved successfully!');
	}
}
