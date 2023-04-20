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
		if (User::all()->where('username', $request->username)->first()->email_verified_at !== null) {
			if (Auth::attempt($request->validated())) {
				Auth::user();
				return redirect()->route('landing');
			} else {
				return back()->withErrors([
					'login' => 'Invalid login credentials',
				]);
			}
		} else {
			return view('auth.verify-email-problem');
		}
	}
}
