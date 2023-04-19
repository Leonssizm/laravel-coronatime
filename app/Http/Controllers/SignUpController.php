<?php

namespace App\Http\Controllers;

use App\Http\Requests\SignUpRequest;
use App\Mail\VerificationMail;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;

class SignUpController extends Controller
{
	public function register(SignUpRequest $request): RedirectResponse
	{
		$user = User::create($request->validated());

		$this->sendVerificationEmail($user);

		return redirect()->route('confirmation');
	}

	protected function sendVerificationEmail($user): void
	{
		$verificationUrl = URL::temporarySignedRoute(
			'email-verified',
			now()->addMinutes(60),
			['id' => $user->id]
		);

		Mail::to($user->email)->send(new VerificationMail($verificationUrl, $user));
	}
}
