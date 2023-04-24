<?php

namespace Tests\Feature;

use App\Models\User;
use App\Notifications\ResetPassword;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Password;
use Tests\TestCase;

class PasswordForgotNotificationTest extends TestCase
{
	use RefreshDatabase, WithFaker;

	private User $user;

	private string $token;

	protected function setUp(): void
	{
		parent::setUp();
		$this->user = User::factory()->create();
		$this->token = Password::createToken($this->user);
		Notification::fake();
	}

	public function test_user_can_receive_password_reset_notification_with_correct_token_and_email()
	{
		$this->user->sendPasswordResetNotification($this->token);
		Notification::assertSentTo(
			$this->user,
			ResetPassword::class,
			fn ($notification) => $notification->token === $this->token && $notification->email === $this->user->email,
		);
	}
}
