<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Cookie;
use Tests\TestCase;

class LangMiddlewareTest extends TestCase
{
	public function test_by_default_lang_cookie_must_be_set_to_en(): void
	{
		$this->get(route('login'));
		$this->assertEquals('en', Cookie::get('lang', config('app.locale')));
	}

	public function test_lang_cookie_does_not_update_when_invalid_value_is_passed(): void
	{
		$response = $this->post(route('set_lang', ['lang' => 'fr']));
		$response->assertSessionHasErrors();
	}

	public function test_lang_cookie_changes_when_correct_value_is_passed(): void
	{
		$defaultCookie = Cookie::get('lang', config('app.locale'));
		$response = $this->post(route('set_lang', ['lang' => 'ka']));
		$this->assertTrue($response->headers->has('Set-Cookie'));
		$this->assertNotEquals($defaultCookie, Cookie::get('lang'));
	}
}
