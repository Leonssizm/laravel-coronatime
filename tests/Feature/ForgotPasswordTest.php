<?php

namespace Tests\Feature;

use App\Mail\ResetPasswordMail;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Tests\TestCase;

class ForgotPasswordTest extends TestCase
{
	use RefreshDatabase;

	public function test_forgot_password_page_is_accessible()
	{
		$response = $this->get(route('forgot-password'));

		$response->assertSuccessful();
		$response->assertViewIs('password.reset-password');
	}

	public function test_reset_password_mail_contains_verification_url()
	{
		$username = 'ragaca';
		$email = 'test123@redberry.ge';
		$password = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi';

		$user = User::factory()->create([
			'username'         => $username,
			'email'            => $email,
			'password'         => $password,
			'email_verified_at'=> now(),
		]);

		$response = $this->post('forgot-password', [
			'email' => $user->email,
		]);

		$verificationUrl = URL::temporarySignedRoute(
			'new-password',
			now()->addMinutes(60),
			['id' => $user->id]
		);

		$resetPasswordMail = new ResetPasswordMail($verificationUrl, $user);

		Mail::fake();

		Mail::to($user->email)->send($resetPasswordMail);

		Mail::assertSent(ResetPasswordMail::class);

		$response->assertRedirect(route('password-confirmation'));
	}

	public function test_change_password()
	{
		$email = 'test123@redberry.ge';
		$password = 'secret';

		$user = User::factory()->create([
			'email'    => $email,
			'password' => $password,
		]);

		$url = URL::temporarySignedRoute(
			'new-password',
			now()->addHour(),
			['id' => $user->id]
		);

		$response = $this->get($url);

		$response->assertStatus(200);

		$newPassword = bcrypt('new_password');

		$response = $this->post(route('new-password'), [
			'id'                    => $user->id,
			'password'              => $newPassword,
			'password_confirmation' => $newPassword,
		]);

		$response->assertRedirect(route('success'));
	}
}
