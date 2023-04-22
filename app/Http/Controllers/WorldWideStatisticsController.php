<?php

namespace App\Http\Controllers;

use App\Models\Statistic;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class WorldWideStatisticsController extends Controller
{
	public function index(): View
	{
		return view('landing-worldwide', [
			'user'       => Auth::user(),
			'statistics' => $this->getDashboardStatistics(),
		]);
	}

	public function getDashBoardStatistics()
	{
		$countries = Statistic::all();

		$statistics = [];

		array_push($statistics, ['new_cases' => number_format($countries->sum('new_cases'), '0', ' ')]);
		array_push($statistics, ['recovered' => number_format($countries->sum('recovered'), '0', ' ')]);
		array_push($statistics, ['deaths' => number_format($countries->sum('deaths'), '0', ' ')]);

		return $statistics;
	}
}
