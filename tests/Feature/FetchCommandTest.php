<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class FetchCommandTest extends TestCase
{
	use RefreshDatabase;

	public function test_fetch_statistics_command()
	{
		Http::fake([
			'https://devtest.ge/countries' => Http::response([
				[
					'code' => 'US',
					'name' => [
						'en' => 'United States',
						'ka' => 'აშშ',
					],
				],
				[
					'code' => 'CA',
					'name' => [
						'en' => 'Canada',
						'ka' => 'კანადა',
					],
				],
			]),
			'https://devtest.ge/get-country-statistics' => Http::response([
				'deaths'    => 100,
				'recovered' => 200,
				'critical'  => 300,
				'confirmed' => 400,
			]),
		]);

		$output = Artisan::call('fetch:statistics');

		$this->assertEquals(0, $output);
	}
}
