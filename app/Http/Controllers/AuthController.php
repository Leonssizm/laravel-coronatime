<?php

namespace App\Http\Controllers;

use App\Http\Requests\SignInRequest;
use App\Http\Requests\SignUpRequest;
use App\Mail\VerificationMail;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;

class AuthController extends Controller
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

	public function login(SignInRequest $request): View | RedirectResponse
	{
		$fieldType = $this->getFieldType($request->username);
		if ($fieldType === 'email') {
			$user = User::where('email', $request->username)->first();
		} else {
			$user = User::where('username', $request->username)->first();
		}

		if (!$user) {
			return back()->withErrors([
				'login' => __('validation.login'),
			]);
		}

		if ($user->email_verified_at === null) {
			return view('auth.verify-email-problem');
		}

		if (Auth::attempt([$fieldType => $request->username, 'password' => $request->password], $request->filled('remember'))) {
			return redirect()->route('landing');
		} else {
			return back()->withErrors([
				'login' => __('validation.login'),
			]);
		}
	}

	public function logout(): RedirectResponse
	{
		auth()->logout();

		return redirect()->route('sign-in');
	}

	private function getFieldType($input): string
	{
		return filter_var($input, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
	}
}
