<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class EmailVerificationController extends Controller
{
	public function verify(EmailVerificationRequest $request)
	{
		$request->fulfill();

		event(new Verified($request->user()));

		return redirect()->route('verification.feedback');
	}
}
