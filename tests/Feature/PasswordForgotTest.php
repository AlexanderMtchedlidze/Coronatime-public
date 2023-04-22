<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Notification;
use Tests\TestCase;

class PasswordForgotTest extends TestCase
{
	use RefreshDatabase, WithFaker;

	private User $user;

	protected function setUp(): void
	{
		parent::setUp();
		$this->user = User::factory()->create();
		Notification::fake();
	}

	public function test_user_can_access_forgot_password_page_when_he_is_not_authorized()
	{
		$response = $this->get('/forgot-password');
		$response->assertOk();
		$response->assertViewIs('passwords.forgot');
	}

	public function test_user_can_not_access_forgot_password_page_when_he_is_authorized()
	{
		$response = $this->actingAs($this->user)->get('/forgot-password');
		$response->assertStatus(302);
		$response->assertRedirect(route('dashboard.worldwide'));
	}

	public function test_user_can_not_send_empty_email_input_value_on_forgot_password_page()
	{
		$response = $this->post('/forgot-password');
		$response->assertSessionHasErrors([
			'email' => 'E-Mail Address is required.',
		]);
		Notification::assertNothingSent();
	}

	public function test_user_can_not_send_empty_email_input_value_is_not_valid_email_address()
	{
		$response = $this->post('/forgot-password', ['email' => $this->user->name]);
		$response->assertSessionHasErrors([
			'email' => 'E-Mail Address must be valid E-Mail Address.',
		]);
		Notification::assertNothingSent();
	}

	public function test_user_can_not_send_empty_email_input_when_value_does_not_exist_in_users_table()
	{
		$email = $this->faker->email;
		$response = $this->post('/forgot-password', ['email' => $email]);
		$this->assertDatabaseMissing('users', ['email' => $email]);
		$response->assertSessionHasErrors([
			'email' => 'E-Mail Address does not exist.',
		]);
		Notification::assertNothingSent();
	}
}
