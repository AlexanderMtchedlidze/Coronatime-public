<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Statistic;

class DashboardController extends Controller
{
	public function worldwide()
	{
		return view('dashboard.worldwide', [
			'totals' => Statistic::getTotals(),
		]);
	}

	public function byCountry()
	{
		return view('dashboard.by-country', [
			'countries' => Country::all(),
			'totals'    => Statistic::getTotals(),
		]);
	}
}
