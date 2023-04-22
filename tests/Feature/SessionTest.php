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

	private string $password = 'examplePassword';

	protected function setUp(): void
	{
		parent::setUp();
		$this->user = User::factory()->create(['password' => $this->password]);
	}

	public function test_user_can_access_log_in_page_when_he_is_not_authorized(): void
	{
		$response = $this->get('/login');
		$response->assertSuccessful();
		$response->assertViewIs('session.create');
	}

	public function test_user_will_be_redirected_to_dashboard_if_he_is_already_authorized(): void
	{
		$response = $this->actingAs($this->user)->get('/login');
		$response->assertRedirect(route('dashboard.worldwide'));
	}

	public function test_auth_should_return_errors_when_input_is_not_provided(): void
	{
		$response = $this->post('/login');
		$response->assertSessionHasErrors([
			'username' => 'Username is required.',
			'password' => 'Password is required.',
		]);
	}

	public function test_auth_should_return_errors_when_input_is_provided_partially(): void
	{
		$response = $this->post('/login', ['username' => $this->user->name]);
		$response->assertSessionHasErrors([
			'password' => 'Password is required.',
		]);
	}

	public function test_auth_should_return_errors_when_provided_input_is_incorrect(): void
	{
		$response = $this->post('/login', ['username' => $this->user->name, 'password' => $this->user->password]);
		$response->assertSessionHasErrors([
			'username' => 'These credentials do not match our records.',
		]);
	}

	public function test_auth_should_log_in_user_when_provided_credentials_are_correct(): void
	{
		$response = $this->post('/login', ['username' => $this->user->name, 'password' => $this->password]);
		$response->assertRedirect(route('dashboard.worldwide'));
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
	}
}
