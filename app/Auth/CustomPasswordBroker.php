<?php

namespace App\Auth;

use Illuminate\Auth\Passwords\PasswordBroker;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\CanResetPassword;
use UnexpectedValueException;

class CustomPasswordBroker extends PasswordBroker
{
	public function getUser(array $credentials): Authenticatable|CanResetPassword|null
	{
		$user = $credentials['token']->user;

		if ($user && !$user instanceof CanResetPassword) {
			throw new UnexpectedValueException('User must implement CanResetPassword interface.');
		}

		return $user;
	}
}
