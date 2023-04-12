<?php

namespace App\Http\Controllers;

class LangController extends Controller
{
	public function __invoke($lang)
	{
		request()->session()->put('lang', $lang);

		return back();
	}
}
