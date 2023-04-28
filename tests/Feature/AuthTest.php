<?php

namespace Tests\Feature;

use App\Http\Controllers\AuthController;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthTest extends TestCase
{
	use RefreshDatabase;

	public function test_login_page_is_accessible()
	{
		$response = $this->get('/');

		$response->assertSuccessful();
		$response->assertViewIs('sign-in');
	}

	public function test_auth_should_give_errors_if_input_is_not_provided()
	{
		$response = $this->post('/sign-in');

		$response->assertSessionHasErrors(['username', 'password']);
	}

	public function test_auth_should_give_us_error_if_we_dont_provide_email_or_username_input()
	{
		$response = $this->post('/sign-in', [
			'password'=> 'secret',
		]);

		$response->assertSessionHasErrors(['username']);

		$response->assertSessionDoesntHaveErrors(['password']);
	}

	public function test_auth_should_give_us_password_error_if_we_dont_provide_password_input()
	{
		$response = $this->post('/sign-in', [
			'username'=> 'something',
		]);

		$response->assertSessionHasErrors(['password']);

		$response->assertSessionDoesntHaveErrors(['username']);
	}

	public function test_auth_should_give_us_incorrect_credentials_error_when_user_does_not_exist()
	{
		$response = $this->post('/sign-in', [
			'username'   => 'something',
			'password'   => 'test',
		]);

		$response->assertSessionHasErrors([
			'login' => __('validation.login'),
		]);
	}

	public function test_auth_should_provide_incorrect_credentials_when_provided_password_is_incorrect()
	{
		$username = 'ragaca';
		$email = 'test123@redberry.ge';
		$password = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi';

		$user = User::factory()->create([
			'username'   => $username,
			'email'      => $email,
			'password'   => $password,
		]);

		$user->email_verified_at = now();

		$response = $this->post('/sign-in', [
			'username' => $username,
			'password' => 'wrong password',
		]);

		$response->assertSessionHasErrors([
			'login' => __('validation.login'),
		]);
	}

	public function test_auth_should_redirect_to_landing_page()
	{
		$username = 'ragaca';
		$email = 'test123@redberry.ge';
		$password = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi';

		$user = User::factory()->create([
			'username'   => $username,
			'email'      => $email,
			'password'   => $password,
		]);

		$user->email_verified_at = now();

		$response = $this->post('/sign-in', [
			'username' => $username,
			'password' => $password,
		]);

		$response->assertRedirect('/landing');
	}

	public function test_user_is_not_verified_redirects_to_error_page()
	{
		$username = 'ragaca';
		$email = 'test123@redberry.ge';
		$password = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi';

		$user = User::factory()->create([
			'username'         => $username,
			'email'            => $email,
			'password'         => $password,
			'email_verified_at'=> null,
		]);

		$response = $this->post('/sign-in', [
			'username' => $username,
			'password' => $password,
		]);

		$response->assertViewIs('auth.verify-email-problem');
	}

	public function test_getFieldType_returns_email_or_username()
	{
		$controller = new AuthController();

		$this->assertEquals('email', $controller->getFieldType('test@example.com'));
		$this->assertEquals('username', $controller->getFieldType('testuser'));
	}

	public function test_login_with_email_or_username()
	{
		$user = User::factory()->create([
			'email'             => 'test@example.com',
			'username'          => 'testuser',
			'password'          => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
			'email_verified_at' => now(),
		]);

		$this->test_getFieldType_returns_email_or_username();

		$response = $this->post('/sign-in', [
			'username' => 'test@example.com',
			'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
		]);

		$response->assertRedirect('/landing');

		$response = $this->post('/sign-in', [
			'username' => 'testuser',
			'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
		]);
		$response->assertRedirect('/landing');
	}
}
