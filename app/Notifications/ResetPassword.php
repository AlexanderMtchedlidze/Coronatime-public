<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ResetPassword extends Notification
{
	use Queueable;

	/**
	 * The password reset token.
	 *
	 * @var string
	 */
	public string $token;

	/**
	 * The email address of the user.
	 *
	 * @var string
	 */
	public string $email;

	/**
	 * Create a new notification instance.
	 */
	public function __construct($token, $email)
	{
		$this->token = $token;
		$this->email = $email;
	}

	/**
	 * Get the notification's delivery channels.
	 *
	 * @return array<int, string>
	 */
	public function via(object $notifiable): array
	{
		return ['mail'];
	}

	/**
	 * Get the mail representation of the notification.
	 */
	public function toMail(object $notifiable): MailMessage
	{
		return (new MailMessage)
			->subject('Reset Password')
			->view('emails.reset-password', ['token' => $this->token, 'email' => $this->email]);
	}

	/**
	 * Get the array representation of the notification.
	 *
	 * @return array<string, mixed>
	 */
	public function toArray(object $notifiable): array
	{
		return [
		];
	}
}
