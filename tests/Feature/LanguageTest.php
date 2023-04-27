<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LanguageTest extends TestCase
{
	use RefreshDatabase;

	public function test_language_change_ka()
	{
		$locale = 'ka';

		$response = $this->get('change.locale/' . $locale);

		$response->assertSessionHas('lang', $locale);
	}

	public function test_language_change_en()
	{
		$locale = 'en';

		$response = $this->get('change.locale/' . $locale);

		$response->assertSessionHas('lang', $locale);
	}

	public function test_change_locale_with_invalid_locale()
	{
		$response = $this->get('change.locale/invalid_locale');

		$response->assertRedirect();
		$response->assertSessionHas('lang', 'en');
	}
}
