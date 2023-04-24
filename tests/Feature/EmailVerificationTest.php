<?php

namespace Tests\Feature;

use App\Mail\EmailVerification;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Tests\TestCase;

class EmailVerificationTest extends TestCase
{
	use RefreshDatabase;

	private User $user;

	protected function setUp(): void
	{
		parent::setUp();
		$this->withoutExceptionHandling();

		$this->user = User::factory()->create([
			'email_verified_at' => null,
		]);
	}

	protected function generateVerificationUrl(User $user): string
	{
		return URL::temporarySignedRoute(
			'verification.verify',
			now()->addMinutes(config('auth.verification.expire', 60)),
			[
				'id'   => $user->id,
				'hash' => sha1($user->email),
			]
		);
	}

	public function test_user_should_receive_email_verification_mail_if_he_registered_successfully()
	{
		Mail::fake();

		$verificationUrl = $this->generateVerificationUrl($this->user);

		Mail::to($this->user->email)->send(new EmailVerification($verificationUrl));

		Mail::assertSent(EmailVerification::class, function ($mail) use ($verificationUrl) {
			return $mail->hasTo($this->user->email) &&
				$mail->verificationUrl === $verificationUrl;
		});
	}

	public function test_user_can_verify_email_after_successful_registration()
	{
		$this->actingAs($this->user);

		$verificationUrl = $this->generateVerificationUrl($this->user);

		$this->get($verificationUrl)->assertRedirect(route('verification.feedback'));

		$this->assertNotNull($this->user->fresh()->email_verified_at);
	}
}
