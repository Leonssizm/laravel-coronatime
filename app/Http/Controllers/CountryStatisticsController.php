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
		session()->put('search', request(['search']));

		return view('landing-country', [
			'user'      => Auth::user(),
			'statistics'=> Statistic::filter(request(['search']))->get(),
		]);
	}

	public function sort(Request $request): View
	{
		$sortBy = $request->sortBy ?? 'location';
		$sortDirection = $request->sortDirection ?? 'asc';

		if (session()->get('search') !== null) {
			$searchTerm = array_values(session()->get('search'));
			$sortedStatistics = Statistic::filter(['search' => reset($searchTerm)])->orderBy($sortBy, $sortDirection);
		} else {
			$sortedStatistics = Statistic::orderBy($sortBy, $sortDirection);
		}
		return view('landing-country', [
			'user'          => Auth::user(),
			'statistics'    => $sortedStatistics->get(),
		]);
	}
}
