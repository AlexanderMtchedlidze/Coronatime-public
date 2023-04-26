<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Contracts\View\View;

class DashboardController extends Controller
{
	public function worldwide(): View
	{
		return view('dashboard.worldwide', [
			'totals' => Country::getTotals(),
		]);
	}

	public function byCountry(): View
	{
		return view('dashboard.by-country', [
			'countries' => Country::filter(request(['name', 'sort', 'statistics']))->get(),
			'totals'    => Country::getTotals(),
		]);
	}
}
