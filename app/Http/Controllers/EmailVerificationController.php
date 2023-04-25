<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomEmailVerificationRequest;
use Illuminate\Http\RedirectResponse;

class EmailVerificationController extends Controller
{
	public function verify(CustomEmailVerificationRequest $request): RedirectResponse
	{
		$request->fulfill();

		return redirect()->route('verification.feedback');
	}
}
