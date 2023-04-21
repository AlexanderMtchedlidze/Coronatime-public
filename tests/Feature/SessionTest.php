<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SessionTest extends TestCase
{
	use RefreshDatabase;

	use WithFaker;

	private User $user;

	protected function setUp(): void
	{
		parent::setUp();
		$this->user = User::factory()->create();
	}

	public function test_user_can_access_log_in_page_when_he_is_not_authorized(): void
	{
		$response = $this->get('/login');
		$response->assertSuccessful();
		$response->assertViewIs('session.create');
		$this->assertGuest();
	}

	public function test_user_will_be_redirected_to_dashboard_if_he_is_already_authorized(): void
	{
		$response = $this->actingAs($this->user)->get('/login');
		$this->assertAuthenticated();
		$response->assertRedirect(route('dashboard.worldwide'));
	}

	public function test_auth_should_return_errors_when_input_is_not_provided(): void
	{
		$response = $this->post('/login');
		$response->assertSessionHasErrors(['username', 'password']);
		$this->assertGuest();
	}

	public function test_auth_should_return_errors_when_input_is_provided_partially(): void
	{
		$response = $this->post('/login', ['username' => $this->user->name]);
		$response->assertSessionHasErrors(['password']);
		$this->assertGuest();
	}

	public function test_auth_should_return_errors_when_provided_input_is_incorrect(): void
	{
		$response = $this->post('/login', ['username' => $this->user->name, 'password' => $this->faker->password]);
		$response->assertSessionHasErrors(['username']);
		$this->assertGuest();
	}

	public function test_auth_should_log_in_user_when_provided_credentials_are_correct(): void
	{
		$email = $this->faker->email;
		$name = $this->faker->name;
		$password = $this->faker->password;
		User::create([
			'name'     => $name,
			'email'    => $email,
			'password' => $password,
		]);
		$response = $this->post('/login', ['username' => $email, 'password' => $password]);
		$response->assertRedirect(route('dashboard.worldwide'));
		$this->assertAuthenticated();
	}

	public function test_user_will_be_redirected_to_login_when_not_logged_in(): void
	{
		$response = $this->post('/logout');
		$response->assertRedirect('/login');
	}

	public function test_user_can_logout_when_he_is_logged_in(): void
	{
		$response = $this->actingAs($this->user)->post('/logout');
		$response->assertRedirect('/login');
		$this->assertGuest();
	}
}
