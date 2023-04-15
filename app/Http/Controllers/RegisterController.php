<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;

class RegisterController extends Controller
{
	public function store(RegisterRequest $request)
	{
		return back();
	}
}
