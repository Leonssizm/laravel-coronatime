<?php

namespace App\Http\Controllers;

use App\Http\Requests\SignInRequest;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class SignInController extends Controller
{
	public function index(): View
	{
		return view('sign-in');
	}

	public function login(SignInRequest $request)
	{
		$user = null;
		$fieldType = $this->getFieldType($request->username);
		$rememberDevice = $request->input('remember') === 'on' ? true : false;
		if ($fieldType === 'email') {
			$user = User::where('email', $request->username)->first();
		} else {
			$user = User::where('username', $request->username)->first();
		}

		if (!$user) {
			return back()->withErrors([
				'login' => 'Invalid login credentials',
			]);
		}

		if ($user->email_verified_at === null) {
			return view('auth.verify-email-problem');
		}

		if (Auth::attempt([$fieldType => $request->username, 'password' => $request->password], $rememberDevice)) {
			Auth::user();
			return redirect()->route('landing');
		} else {
			return back()->withErrors([
				'login' => 'Invalid login credentials',
			]);
		}
	}

	public function getFieldType($input)
	{
		return filter_var($input, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
	}
}
