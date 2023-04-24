<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cookie;
use Illuminate\View\Component;

class LangDropdown extends Component
{
	public $currentLang;

	/**
	 * Create a new component instance.
	 */
	public function __construct()
	{
		$this->currentLang = Cookie::get('lang', config('app.locale'));
	}

	/**
	 * Get the view / contents that represent the component.
	 */
	public function render(): View|Closure|string
	{
		return view('components.lang-dropdown', [
			'currentLang' => $this->currentLang,
		]);
	}
}
