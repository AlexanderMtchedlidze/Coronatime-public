<?php

namespace App\Http\Controllers;

use App\Http\Requests\SendPasswordResetLinkRequest;
use App\Http\Requests\UpdatePasswordRequest;
use App\Models\PasswordResetToken;
use App\Models\User;
use Illuminate\Support\Facades\Password;

class PasswordController extends Controller
{
	public function sendResetLink(SendPasswordResetLinkRequest $request)
	{
		$status = Password::sendResetLink($request->only('email'));
		return $status === Password::RESET_LINK_SENT
			? redirect()->route('verification.notice')->with(['status' => __($status)])
			: redirect()->route('verification.notice')->withErrors(['password' => __($status)]);
	}

	public function resetPassword($token)
	{
		dd(PasswordResetToken::all());
		dd(PasswordResetToken::where('token', bcrypt('$2y$10$aEqztgUa0YOgARv7NOdipeTyDWzVVFF3t6hGcsexPyW6QZ.pT7dTW')));

		return view('passwords.reset', ['token' => $token]);
	}

	public function updatePassword(UpdatePasswordRequest $request)
	{
		Password::reset(
			$request->only('password', 'password_confirmation', 'token'),
			function (User $user, string $password) {
				$user->password = $password;
				$user->save();
			}
		);
	}
}
