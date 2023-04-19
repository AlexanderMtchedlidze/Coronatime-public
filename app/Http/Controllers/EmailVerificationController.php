<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomEmailVerificationRequest;

class EmailVerificationController extends Controller
{
	public function verify(CustomEmailVerificationRequest $request)
	{
		$request->fulfill();

		return redirect()->route('verification.feedback');
	}
}
