<?php

namespace Tests\Feature;

use App\Models\Country;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CountryTest extends TestCase
{
	use RefreshDatabase;

	public function test_countries_get_totals_returns_correct_sum_of_all_statistics()
	{
		Country::factory(10)->create();

		$totals = Country::getTotals();

		$this->assertEquals(Country::sum('confirmed'), $totals['newCases']);
		$this->assertEquals(Country::sum('recovered'), $totals['recovered']);
		$this->assertEquals(Country::sum('deaths'), $totals['deaths']);
	}

	public function test_correct_output_is_being_returned_when_searching_by_country_name_in_english()
	{
		Country::factory()->create(['name' => ['en' => 'Georgia', 'ka' => 'საქართველო']]);

		$filters = ['name' => 'Geor'];
		$result = Country::filter($filters)->get();
		$this->assertEquals(1, $result->count());
		$this->assertTrue($result->contains('name', 'Georgia'));
	}

	public function test_correct_output_is_being_returned_when_searching_by_country_name_in_georgian()
	{
		Country::factory()->create(['name' => ['en' => 'Georgia', 'ka' => 'საქართველო']]);

		$filters = ['name' => 'საქართ'];
		$result = Country::filter($filters)->get();
		$this->assertEquals(1, $result->count());
		config(['app.locale' => 'ka']);
		$this->assertTrue($result->contains('name', 'საქართველო'));
	}

	public function test_correct_output_is_being_returned_when_countries_are_filtered_by_descending_and_recovered_statistics()
	{
		Country::factory()->create(['name' => ['en' => 'Georgia', 'ka' => ' საქართველო'], 'recovered' => 50]);
		Country::factory()->create(['name' => ['en' => 'Philippines', 'ka' => 'ფილიპინები'], 'recovered' => 100]);
		Country::factory()->create(['name' => ['en' => 'Malaysia', 'ka' => 'მალაიზია'], 'recovered' => 150]);

		$filters = ['statistics' => 'recovered', 'sort' => 'desc'];
		$result = Country::filter($filters)->get();

		$this->assertEquals('Malaysia', $result[0]->name);
		$this->assertEquals('Philippines', $result[1]->name);
		$this->assertEquals('Georgia', $result[2]->name);
	}

	public function test_correct_output_is_being_returned_when_countries_are_filtered_by_ascending_and_deaths_statistics()
	{
		Country::factory()->create(['name' => ['en' => 'Georgia', 'ka' => ' საქართველო'], 'deaths' => 200]);
		Country::factory()->create(['name' => ['en' => 'Philippines', 'ka' => 'ფილიპინები'], 'deaths' => 40]);
		Country::factory()->create(['name' => ['en' => 'Malaysia', 'ka' => 'მალაიზია'], 'deaths' => 150]);

		$filters = ['statistics' => 'deaths', 'sort' => 'asc'];
		$result = Country::filter($filters)->get();

		$this->assertEquals('Philippines', $result[0]->name);
		$this->assertEquals('Malaysia', $result[1]->name);
		$this->assertEquals('Georgia', $result[2]->name);
	}

	public function test_sorting_works_along_with_searching_at_the_same_time()
	{
		Country::factory()->create(['name' => ['en' => 'Georgia', 'ka' => ' საქართველო'], 'deaths' => 200]);
		Country::factory()->create(['name' => ['en' => 'Philippines', 'ka' => 'ფილიპინები'], 'deaths' => 40]);
		Country::factory()->create(['name' => ['en' => 'Malaysia', 'ka' => 'მალაიზია'], 'deaths' => 150]);

		$filters = ['name' => 'Geo', 'statistics' => 'deaths', 'sort' => 'desc'];
		$result = Country::filter($filters)->get();
		$this->assertEquals(1, $result->count());
		$this->assertEquals('Georgia', $result[0]->name);
	}
}
