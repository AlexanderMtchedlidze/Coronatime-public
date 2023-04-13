<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered;

class RegisterController extends Controller
{
	public function store(RegisterRequest $request)
	{
		$user = User::create($request->validated());

		event(new Registered($user));

		return back();
	}
}
