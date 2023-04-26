<?php

namespace App\Models;

use App\Mail\EmailVerification;
use App\Notifications\ResetPassword;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
	use HasApiTokens, HasFactory, Notifiable;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array<int, string>
	 */
	protected $fillable = [
		'name',
		'email',
		'password',
	];

	/**
	 * The attributes that should be hidden for serialization.
	 *
	 * @var array<int, string>
	 */
	protected $hidden = [
		'password',
		'remember_token',
	];

	/**
	 * The attributes that should be cast.
	 *
	 * @var array<string, string>
	 */
	protected $casts = [
		'email_verified_at' => 'datetime',
	];

	public function setPasswordAttribute($password): void
	{
		$this->attributes['password'] = bcrypt($password);
	}

	public function sendEmailConfirmationNotification(): void
	{
		$verificationUrl = URL::temporarySignedRoute(
			'verification.verify',
			now()->addMinutes(60),
			[
				'id'   => $this->id,
				'hash' => sha1($this->email),
			]
		);

		Mail::to($this->email)->send(new EmailVerification($verificationUrl));
	}

	/**
	 * Send a password reset notification to the user.
	 *
	 * @param string $token
	 */
	public function sendPasswordResetNotification($token): void
	{
		$this->notify(new ResetPassword($token, $this->email));
	}
}
