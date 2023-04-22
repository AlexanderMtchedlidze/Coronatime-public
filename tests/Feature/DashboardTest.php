<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DashboardTest extends TestCase
{
	use RefreshDatabase;

	private User $user;

	protected function setUp(): void
	{
		parent::setUp();
		$this->user = User::factory()->create();
	}

	public function test_user_can_not_access_dashboard_worldwide_page_when_he_is_not_authorized(): void
	{
		$response = $this->get(route('dashboard.worldwide'));
		$response->assertStatus(302);
		$response->assertRedirect('/login');
	}

	public function test_user_can_access_dashboard_worldwide_page_when_he_is_authorized(): void
	{
		$response = $this->actingAs($this->user)->get(route('dashboard.worldwide'));
		$response->assertViewIs('dashboard.worldwide');
	}

	public function test_user_can_not_access_dashboard_by_country_page_when_he_is_not_authorized(): void
	{
		$response = $this->get(route('dashboard.by_country'));
		$response->assertStatus(302);
		$response->assertRedirect('/login');
	}

	public function test_user_can_not_access_dashboard_by_country_page_when_he_is_not_verified(): void
	{
		$this->user->email_verified_at = null;
		$response = $this->actingAs($this->user)->get(route('dashboard.by_country'));
		$response->assertStatus(302);
		$response->assertRedirect(route('verification.notice'));
	}

	public function test_user_can_not_access_dashboard_by_country_page_when_he_is_authorized_and_verified(): void
	{
		$response = $this->actingAs($this->user)->get(route('dashboard.by_country'));
		$response->assertViewIs('dashboard.by-country');
	}
}
