<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRegisterRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered;

class RegisterController extends Controller
{
	public function store(StoreRegisterRequest $request)
	{
		$attributes = $request->validated();
		$user = User::create([
			'name'     => $attributes['name'],
			'email'    => $attributes['email'],
			'password' => $attributes['password'],
		]);

		event(new Registered($user));

		return redirect()->route('verification.notice');
	}
}
