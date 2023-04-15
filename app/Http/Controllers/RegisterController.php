<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;

class RegisterController extends Controller
{
	public function store(RegisterRequest $request)
	{
		$attributes = $request->validated();
		$user = User::create([
			'name'     => $attributes['name'],
			'email'    => $attributes['email'],
			'password' => $attributes['password'],
		]);

		$user->sendConfirmationEmail();

		return back();
	}
}
