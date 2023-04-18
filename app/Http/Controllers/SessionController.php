<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSessionRequest;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
	public function store(StoreSessionRequest $request)
	{
		if (!auth()->attempt($request->validated(), $request->filled('remember-me'))) {
			throw ValidationException::withMessages(['username' => trans('auth.failed')]);
		}

		return redirect()->route('statistics.index');
	}
}
