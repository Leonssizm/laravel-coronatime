<?php

namespace App\Http\Controllers;

use App\Http\Requests\SignUpRequest;
use App\Mail\VerificationMail;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;

class SignUpController extends Controller
{
	public function index(): View
	{
		return view('sign-up');
	}

	public function confirm(): View
	{
		return view('password.confirmation');
	}

	public function register(SignUpRequest $request): RedirectResponse
	{
		$data = $request->validated();
		$data['password'] = bcrypt($data['password']);

		$user = User::create($data);

		$this->sendVerificationEmail($user);

		return redirect()->route('confirmation');
	}

	protected function sendVerificationEmail($user)
	{
		$verificationUrl = URL::temporarySignedRoute(
			'email-verified',
			now()->addMinutes(60),
			['id' => $user->id]
		);

		Mail::to($user->email)->send(new VerificationMail($verificationUrl, $user));
	}
}
