<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSessionRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
	public function login(StoreSessionRequest $request): RedirectResponse
	{
		$attributes = $request->validated();
		$user = User::where('email', $attributes['username'])
			->orWhere('name', $attributes['username'])
			->first();

		if ($user && Hash::check($attributes['password'], $user->password)) {
			Auth::login($user, $request->filled('remember-me'));
			session()->regenerate();
			return redirect()->route('dashboard.worldwide');
		} else {
			throw ValidationException::withMessages(['username' => trans('auth.failed')]);
		}
	}

	public function logout(): RedirectResponse
	{
		auth()->logout();

		session()->regenerate();

		return redirect()->route('login');
	}
}
