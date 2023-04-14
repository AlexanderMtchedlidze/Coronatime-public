<?php

namespace App\Notifications;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class VerifyRegistration extends VerifyEmail
{
	use Queueable;

	public string $url;

	/**
	 * Create a new notification instance.
	 */
	public function __construct(string $url)
	{
		$this->url = $url;
	}

	/**
	 * Get the notification's delivery channels.
	 *
	 * @return array<int, string>
	 */
	public function via($notifiable): array
	{
		return ['mail'];
	}

	/**
	 * Get the mail representation of the notification.
	 */
	public function toMail($notifiable): MailMessage
	{
		return (new MailMessage)
			->subject('Verify Your Email Address')
			->line('Please click the button below to verify your email address.')
			->action('Verify Email Address', $this->url)
			->line('If you did not create an account, no further action is required.');
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
