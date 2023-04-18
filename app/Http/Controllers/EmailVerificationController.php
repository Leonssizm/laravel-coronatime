<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;

class EmailVerificationController extends Controller
{
	public function validateUser(): View
	{
		if (request()->hasValidSignature()) {
			$user = User::all()->where('id', request()->id)->first();
			$user->email_verified_at = now();
			$user->save();
			return view('auth.verify-email');
		} else {
			return view('auth.verify-email-problem');
		}
	}
}
