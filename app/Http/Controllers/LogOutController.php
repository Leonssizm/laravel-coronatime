<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;

class LogOutController extends Controller
{
	public function logout(): RedirectResponse
	{
		auth()->logout();

		return redirect()->route('sign-in');
	}
}
