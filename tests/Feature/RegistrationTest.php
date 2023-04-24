<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Notification;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
	use RefreshDatabase, WithFaker;

	private User $user;

	private string $email = 'test@example.com';

	private string $name = 'testName';

	private string $password = 'testPassword';

	private string $twoChars;

	protected function setUp(): void
	{
		parent::setUp();
		$this->twoChars = $this->faker->randomLetter . $this->faker->randomLetter;
		$this->user = User::factory()->create([
			'name'  => $this->name,
			'email' => $this->email,
		]);
		Notification::fake();
	}

	public function test_user_can_access_register_page_when_he_is_not_authorized()
	{
		$response = $this->get('/register');
		$response->assertOk();
		$response->assertViewIs('register.create');
	}

	public function test_user_can_not_access_register_page_when_he_is_authorized()
	{
		$response = $this->actingAs($this->user)->get('/register');
		$response->assertRedirect(route('dashboard.worldwide'));
		$response->assertStatus(302);
	}

	public function test_user_can_not_submit_empty_inputs_when_registering()
	{
		$response = $this->post('/register');
		$response->assertSessionHasErrors([
			'name'     => 'Username is required.',
			'email'    => 'E-Mail Address is required.',
			'password' => 'Password is required.',
		]);
	}

	public function test_validation_should_return_error_when_name_input_does_not_contain_unique_value()
	{
		$response = $this->post('/register', ['name' => $this->name]);
		$response->assertSessionHasErrors([
			'name' => 'Username already exists.',
		]);
	}

	public function test_username_input_value_must_exceed_min_3_characters()
	{
		$response = $this->post('/register', ['name' => $this->twoChars]);
		$response->assertSessionHasErrors([
			'name' => 'Username must exceed 3 characters.',
		]);
	}

	public function test_email_input_value_must_be_a_valid_email_address()
	{
		$response = $this->post('/register', ['email' => 'invalidEmailAddress']);
		$response->assertSessionHasErrors([
			'email' => 'E-Mail Address must be valid E-Mail Address.',
		]);
	}

	public function test_validation_should_return_error_when_email_input_does_not_contain_unique_value()
	{
		$response = $this->post('/register', ['email' => $this->email]);
		$response->assertSessionHasErrors([
			'email' => 'E-Mail Address already exists.',
		]);
		Notification::assertNothingSent();
	}

	public function test_password_input_value_must_exceed_min_3_characters()
	{
		$response = $this->post('/register', ['password' => $this->twoChars]);
		$response->assertSessionHasErrors([
			'password' => 'Password must exceed 3 characters.',
		]);
		Notification::assertNothingSent();
	}

	public function test_password_inputs_value_must_be_matching()
	{
		$response = $this->post('/register', ['password' => $this->twoChars, 'password_confirmation' => $this->faker->password]);
		$response->assertSessionHasErrors([
			'password' => 'The Password field confirmation does not match.',
		]);
		Notification::assertNothingSent();
	}

	public function test_validation_should_return_errors_when_input_value_is_partly_provided()
	{
		$response = $this->post('/register', ['name' => $this->faker->userName, 'email' => $this->faker->email]);
		$response->assertSessionHasErrors([
			'password' => 'Password is required.',
		]);
		Notification::assertNothingSent();
	}

	public function test_user_should_register_when_he_provided_correct_credentials()
	{
		$password = $this->faker->password;
		$userData = [
			'name'                  => $this->faker->userName,
			'email'                 => $this->faker->email,
			'password'              => $password,
			'password_confirmation' => $password,
		];
		$response = $this->post('/register', $userData);
		$response->assertRedirect(route('verification.notice'));
		$response->assertStatus(302);
		$this->assertDatabaseHas('users', ['name' => $userData['name']]);
	}
}
