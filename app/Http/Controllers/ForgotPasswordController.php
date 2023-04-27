<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePasswordRequest;
use App\Mail\ResetPasswordMail;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;

class ForgotPasswordController extends Controller
{
	public function sendVerificationEmail(Request $request): RedirectResponse
	{
		$email = $request->validate(['email' => 'required|exists:users,email'])['email'];
		$user = User::all()->where('email', $email)->first();
		$this->resetPasswordEmail($user);

		return redirect()->route('password-confirmation');
	}

	public function resetPasswordEmail($user): void
	{
		$verificationUrl = URL::temporarySignedRoute(
			'new-password',
			now()->addMinutes(60),
			['id' => $user->id]
		);

		Mail::to($user->email)->send(new ResetPasswordMail($verificationUrl, $user));
	}

	public function changePassword(ChangePasswordRequest $request): RedirectResponse
	{
		$user = User::find($request->id);

		$user->password = $request->validated()['password'];

		$user->save();

		return redirect()->route('success');
	}
}
