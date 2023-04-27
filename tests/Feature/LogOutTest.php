<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LogOutTest extends TestCase
{
	use RefreshDatabase;

	public function test_logout()
	{
		$user = User::factory()->create([
			'username'                  => 'test',
			'email'                     => 'test123@redberry.ge',
			'password'                  => 'password',
			'email_verified_at'         => now(),
		]);

		$response = $this->actingAs($user)->post(route('logout'));

		$response->assertRedirect(route('sign-in'));
		$this->assertGuest();
	}
}
