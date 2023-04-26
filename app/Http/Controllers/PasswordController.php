<?php

namespace App\Http\Controllers;

use App\Http\Requests\SendPasswordResetLinkRequest;
use App\Http\Requests\UpdatePasswordRequest;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Password;

class PasswordController extends Controller
{
	public function sendResetLink(SendPasswordResetLinkRequest $request): RedirectResponse
	{
		$status = Password::sendResetLink($request->only('email'));
		return $status === Password::RESET_LINK_SENT
			? redirect()->route('verification.notice')->with(['status' => __($status)])
			: redirect()->route('verification.notice')->withErrors(['password' => __($status)]);
	}

	public function resetPassword(string $token): View
	{
		return view('passwords.reset', ['token' => $token]);
	}

	public function updatePassword(UpdatePasswordRequest $request): RedirectResponse
	{
		$status = Password::reset(
			$request->validated(),
			function (User $user, string $password) {
				$user->forceFill([
					'password' => $password,
				]);
				$user->save();
			}
		);

		return $status === Password::PASSWORD_RESET
			? redirect()->route('password.feedback')->with('status', __($status))
			: redirect()->route('password.feedback')->withErrors(['password' => [__($status)]]);
	}
}
