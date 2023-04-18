<?php

namespace App\Http\Controllers;

class LogOutController extends Controller
{
	public function logout()
	{
		auth()->logout();

		return redirect()->route('sign-in');
	}
}
