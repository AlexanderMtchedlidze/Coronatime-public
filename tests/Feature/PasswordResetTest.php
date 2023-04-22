<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Password;
use Tests\TestCase;

class PasswordResetTest extends TestCase
{
	use RefreshDatabase, WithFaker;

	private User $user;

	private string $token;

	private string $oldPassword = 'oldTestPassword';

	protected function setUp(): void
	{
		parent::setUp();
		$this->user = User::factory()->create([
			'password' => $this->oldPassword,
		]);
		$this->token = Password::createToken($this->user);
	}

	public function test_unauthenticated_user_can_access_password_reset_page()
	{
		$response = $this->get(route('password.reset', ['token' => $this->token]));
		$response->assertOk();
		$response->assertViewIs('passwords.reset');
	}

	public function test_unauthenticated_user_can_not_access_password_reset_page()
	{
		$response = $this->actingAs($this->user)->get(route('password.reset', ['token' => $this->token]));
		$response->assertStatus(302);
		$response->assertRedirect(route('dashboard.worldwide'));
	}

	public function test_authenticated_user_can_not_send_post_request_to_password_reset_page()
	{
		$response = $this->actingAs($this->user)->post(route('password.update'));
		$response->assertStatus(302);
		$response->assertRedirect(route('dashboard.worldwide'));
	}

	public function test_validation_will_return_errors_when_user_submits_empty_inputs()
	{
		$response = $this->post(route('password.update'));
		$response->assertSessionHasErrors([
			'email'    => 'E-Mail Address is required.',
			'password' => 'Password is required.',
			'token'    => 'token is required.',
		]);
	}

	public function test_validation_will_return_errors_when_provided_email_is_not_valid_email_address()
	{
		$response = $this->post(route('password.update', ['email' => $this->faker->name]));
		$response->assertSessionHasErrors([
			'email' => 'E-Mail Address must be valid E-Mail Address.',
		]);
	}

	public function test_validation_will_return_errors_when_provided_email_does_not_exist_in_users_table()
	{
		$response = $this->post(route('password.update', ['email' => $this->faker->email]));
		$response->assertSessionHasErrors([
			'email' => 'E-Mail Address does not exist.',
		]);
	}

	public function test_validation_will_return_errors_when_provided_password_does_not_exceed_min_characters()
	{
		$response = $this->post(route('password.update', ['password' => $this->faker->randomLetter . $this->faker->randomLetter]));
		$response->assertSessionHasErrors([
			'password' => 'Password must exceed 3 characters.',
		]);
	}

	public function test_validation_will_return_errors_when_provided_password_confirmation_does_not_matches_password()
	{
		$response = $this->post(route('password.update', ['password' => $this->faker->password, 'password_confirmation' => $this->faker->password]));
		$response->assertSessionHasErrors([
			'password' => 'The Password field confirmation does not match.',
		]);
	}

	public function test_validation_will_return_errors_when_input_values_are_provided_partly()
	{
		$response = $this->post(route('password.update', ['email' => $this->user->email, 'password' => $this->faker->password]));
		$response->assertSessionHasErrors([
			'password' => 'The Password field confirmation does not match.',
			'token'    => 'token is required.',
		]);
	}

	public function test_user_password_will_be_updated_successfully_when_all_inputs_are_correct()
	{
		$newPassword = $this->faker->password;
		$response = $this->post(route('password.update', ['email' => $this->user->email, 'token' => $this->token, 'password' => $newPassword, 'password_confirmation' => $newPassword]));
		$response->assertStatus(302);
		$this->user->refresh();
		$this->assertNotEquals(bcrypt($this->oldPassword), $newPassword);
		$response->assertRedirect(route('password.feedback'));
	}
}
