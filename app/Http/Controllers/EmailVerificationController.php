<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class EmailVerificationController extends Controller
{
	public function validateUser(Request $request): View
	{
		if ($request->hasValidSignature()) {
			$user = User::find($request->id);
			$user->markEmailAsVerified();
			return view('auth.verify-email');
		} else {
			return view('auth.verify-email-problem');
		}
	}
}
