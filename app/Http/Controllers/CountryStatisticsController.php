<?php

namespace App\Http\Controllers;

use App\Models\Statistic;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CountryStatisticsController extends Controller
{
	public function index(): View
	{
		return view('landing-country', [
			'user'      => Auth::user(),
			'statistics'=> Statistic::filter(request(['search']))->get(),
		]);
	}

	public function sort(Request $request): View
	{
		$sortBy = $request->sortBy ?? 'location';
		$sortDirection = $request->sortDirection ?? 'asc';

		$statistics = Statistic::orderBy($sortBy, $sortDirection);

		return view('landing-country', [
			'user'          => Auth::user(),
			'statistics'    => $statistics->filter(request(['search']))->get(),
		]);
	}
}
