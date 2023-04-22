<?php

namespace App\Http\Controllers;

use App\Models\Statistic;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class CountryStatisticsController extends Controller
{
	public function index(): View
	{
		return view('landing-country', [
			'user'      => Auth::user(),
			'statistics'=> Statistic::all(),
		]);
	}
}
