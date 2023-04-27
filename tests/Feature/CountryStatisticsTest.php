<?php

namespace Tests\Feature;

use App\Models\Statistic;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\App;
use Tests\TestCase;

class CountryStatisticsTest extends TestCase
{
	use RefreshDatabase;

	public function test_country_statistics_page_is_accessible()
	{
		$username = 'ragaca';
		$email = 'test123@redberry.ge';
		$password = 'password';

		$user = User::factory()->create([
			'username'         => $username,
			'email'            => $email,
			'password'         => $password,
			'email_verified_at'=> now(),
		]);

		$this->actingAs($user);

		$response = $this->get(route('landing-country.index'));

		$response->assertStatus(200);
	}

	public function test_country_statistics_search_en()
	{
		$statistic = Statistic::factory()->create([
			'location' => [
				'en' => 'United States',
				'ka' => 'აშშ',
			],
			'deaths'    => 100,
			'new_cases' => 50,
			'critical'  => 10,
			'recovered' => 70,
		]);

		$searchTerm = explode(' ', $statistic->location)[0]; //United

		$results = Statistic::filter(['search' => $searchTerm])->get();

		$expectedResults = Statistic::where('location', 'like', '%' . $searchTerm . '%')->get();

		$this->assertEquals($expectedResults, $results);
	}

	public function test_country_statistics_search_ka()
	{
		App::setLocale('ka');

		$statistic = Statistic::factory()->create([
			'location' => [
				'en' => 'United States',
				'ka' => 'აშშ',
			],
			'deaths'    => 100,
			'new_cases' => 50,
			'critical'  => 10,
			'recovered' => 70,
		]);

		$searchTerm = 'აშშ';

		$results = Statistic::filter(['search' => $searchTerm])->get();

		$expectedResults = Statistic::where('location->ka', 'like', '%' . $searchTerm . '%')->get();

		$this->assertEquals($expectedResults, $results);
	}

	public function test_country_sort_location()
	{
		$username = 'ragaca';
		$email = 'test123@redberry.ge';
		$password = 'password';

		$user = User::factory()->create([
			'username'         => $username,
			'email'            => $email,
			'password'         => $password,
			'email_verified_at'=> now(),
		]);

		$this->actingAs($user);
		$australia = Statistic::factory()->create(['location' => 'Australia']);
		$brazil = Statistic::factory()->create(['location' => 'Brazil']);
		$canada = Statistic::factory()->create(['location' => 'Canada']);

		$response = $this->get(route('landing-country.sort', ['sortBy' => 'location', 'sortDirection' => 'asc']));

		$response->assertSeeInOrder([$australia->location, $brazil->location, $canada->location]);

		$response = $this->get(route('landing-country.sort', ['sortBy' => 'location', 'sortDirection' => 'desc']));

		$response->assertSeeInOrder([$canada->location, $brazil->location, $australia->location]);
	}
}
