<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRegisterRequest;
use App\Models\User;

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

		$user->sendEmailConfirmationNotification();

		return redirect()->route('verification.notice');
	}
}
