<?php

namespace App\Http\Controllers;

use App\Models\Country;

class DashboardController extends Controller
{
	public function worldwide()
	{
		return view('dashboard.worldwide', [
			'totals' => Country::getTotals(),
		]);
	}

	public function byCountry()
	{
		return view('dashboard.by-country', [
			'countries' => Country::filter(request(['name', 'sort', 'statistics']))->get(),
			'totals'    => Country::getTotals(),
		]);
	}
}
