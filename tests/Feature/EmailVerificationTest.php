<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\URL;
use JsonException;
use Tests\TestCase;

class EmailVerificationTest extends TestCase
{
	use RefreshDatabase;

	private User $user;

	private VerifyEmail $notification;

	protected function setUp(): void
	{
		parent::setUp();
		$this->withoutExceptionHandling();

		$this->user = User::factory()->create([
			'email_verified_at' => null,
		]);

		Notification::fake();
		$this->notification = new VerifyEmail();
		$this->notification->id = $this->user->id;
		$this->notification->hash = sha1($this->user->email);

		Event::fake();
		event(new Registered($this->user));
	}

	public function test_user_should_receive_email_verification_mail_if_he_registered_successfully()
	{
		Event::assertDispatched(Registered::class, fn ($event) => $event->user->id === $this->user->id);
		$this->user->notify($this->notification);
		Notification::assertSentTo($this->user, VerifyEmail::class);
	}

	/**
	 * @throws JsonException
	 */
	public function test_user_can_verify_email_after_successful_registration()
	{
		Event::assertDispatched(Registered::class, fn ($event) => $event->user->id === $this->user->id);

		$this->user->notify($this->notification);
		Notification::assertSentTo($this->user, VerifyEmail::class);

		$url = URL::signedRoute('verification.verify', ['id' => $this->notification->id, 'hash' => $this->notification->hash]);
		$response = $this->actingAs($this->user)->get($url);
		$response->assertSessionHasNoErrors();
		$response->assertRedirect(route('verification.feedback'));
		$this->user->refresh();
		$this->assertNotNull($this->user->email_verified_at);
		$this->actingAs($this->user)->get(route('dashboard.by_country'))->assertOk();
	}
}
