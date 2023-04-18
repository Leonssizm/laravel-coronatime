<?php

namespace App\Http\Controllers;

use App\Http\Requests\SignInRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class SignInController extends Controller
{
	public function index(): View
	{
		return view('sign-in');
	}

	public function verifyEmail(): View
	{
		return view('auth.confirmation');
	}

	public function login(SignInRequest $request): RedirectResponse
	{
		if (Auth::attempt(($request->validated()), true)) {
			Auth::user();
			return redirect()->route('landing');
		} else {
			return back()->withErrors([
				'login' => 'Invalid login credentials',
			]);
		}
	}
}
