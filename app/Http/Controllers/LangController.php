<?php

namespace App\Http\Controllers;

class LangController extends Controller
{
	public function __invoke($lang)
	{
		return back()->cookie('lang', $lang, 60 * 24 * 30);
	}
}
