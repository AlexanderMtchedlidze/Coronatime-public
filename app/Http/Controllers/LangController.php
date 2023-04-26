<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;

class LangController extends Controller
{
	public function __invoke(string $lang): RedirectResponse
	{
		if ($lang === 'en' || $lang === 'ka') {
			return back()->cookie('lang', $lang, 60 * 24 * 30);
		}
		return back()->withErrors(['lang' => 'Invalid language code ' . $lang]);
	}
}
