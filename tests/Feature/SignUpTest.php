<?php

namespace Tests\Feature;

use App\Mail\VerificationMail;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Tests\TestCase;

class SignUpTest extends TestCase
{
	use RefreshDatabase;

	public function test_sign_up_page_is_accessible()
	{
		$response = $this->get(route('sign-up'));

		$response->assertSuccessful();
		$response->assertViewIs('sign-up');
	}

	public function test_sign_up_should_provide_errors_if_input_is_not_provided()
	{
		$response = $this->post('/sign-up');

		$response->assertSessionHasErrors(['username', 'password', 'email']);
	}

	public function test_sign_up_should_provide_errors_if_username_is_not_provided()
	{
		$email = 'test123@redberry.ge';
		$password = 'secret';
		$response = $this->post('/sign-up', [
			'email'   => $email,
			'password'=> $password,
		]);

		$response->assertSessionHasErrors(['username']);
	}

	public function test_sign_up_should_provide_errors_if_email_is_not_provided()
	{
		$username = 'test';
		$password = 'secret';
		$response = $this->post('/sign-up', [
			'username'   => $username,
			'password'   => $password,
		]);

		$response->assertSessionHasErrors(['email']);
	}

	public function test_sign_up_should_provide_errors_if_password_is_not_provided()
	{
		$username = 'test';
		$email = 'test123@redberry.ge';
		$response = $this->post('/sign-up', [
			'email'   => $email,
			'username'=> $username,
		]);

		$response->assertSessionHasErrors(['password']);
	}

	public function test_user_registration_and_verification_email_sent()
	{
		$userData = [
			'username'                  => 'test',
			'email'                     => 'test123@redberry.ge',
			'password'                  => 'password',
			'password_confirmation'     => 'password',
		];

		$response = $this->post('/sign-up', $userData);

		$response->assertRedirect('/confirmation');

		$user = User::where('email', $userData['email'])->first();

		$this->assertNotNull($user);

		$this->assertNull($user->email_verified_at);

		$verificationUrl = URL::temporarySignedRoute(
			'email-verified',
			now()->addMinutes(60),
			['id' => $user->id]
		);

		$verifyAccountMail = new VerificationMail($verificationUrl, $user);

		Mail::fake();

		Mail::to($user->email)->send($verifyAccountMail);

		Mail::assertSent(VerificationMail::class);
	}

	public function test_valid_email_verification_link()
	{
		$user = User::factory()->create([
			'username'                  => 'test',
			'email'                     => 'test123@redberry.ge',
			'password'                  => 'password',
		]);

		$verificationUrl = URL::temporarySignedRoute(
			'email-verified',
			now()->addMinutes(60),
			['id' => $user->id]
		);

		$response = $this->get($verificationUrl);

		$this->assertTrue($user->fresh()->hasVerifiedEmail());

		$response->assertViewIs('auth.verify-email');
	}
}
