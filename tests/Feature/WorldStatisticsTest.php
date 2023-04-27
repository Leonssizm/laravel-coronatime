<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class WorldStatisticsTest extends TestCase
{
	use RefreshDatabase;

	public function test_world_statistics_page_is_accessible()
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

		$response = $this->get(route('landing'));

		$response->assertStatus(200);
	}
}
