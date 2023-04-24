<?php

namespace App\Console\Commands;

use App\Models\Statistic;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class FetchStatisticsData extends Command
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'fetch:statistics';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Fetches data from an API and stores it in a database';

	/**
	 * Execute the console command.
	 */
	public function handle()
	{
		$countries = Http::get('https://devtest.ge/countries')->json();

		foreach ($countries as $country) {
			$allCountries = Http::post('https://devtest.ge/get-country-statistics', ['code' => $country['code']])->json();

			Statistic::updateOrCreate(
				['location->en' => $country['name']['en']],
				[
					'location' => [
						'en' => $country['name']['en'],
						'ka' => $country['name']['ka'],
					],
					'deaths'    => $allCountries['deaths'],
					'recovered' => $allCountries['recovered'],
					'critical'  => $allCountries['critical'],
					'new_cases' => $allCountries['confirmed'],
				]
			);
		}

		return Command::SUCCESS;
	}
}
