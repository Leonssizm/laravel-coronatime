<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class SignInController extends Controller
{
	public function index(): View
	{
		return view('sign-in');
	}
}
