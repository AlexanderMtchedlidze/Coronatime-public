<?php

namespace Database\Factories;

use App\Models\Country;
use Illuminate\Database\Eloquent\Factories\Factory;

class CountryFactory extends Factory
{
	protected $model = Country::class;

	public function definition(): array
	{
		return [
			'name' => [
				'en' => $this->faker->country,
				'ka' => fake('ka_GE')->realText(10),
			],
			'code'      => $this->faker->randomLetter() . $this->faker->randomLetter(),
			'confirmed' => $this->faker->randomNumber(3, true),
			'recovered' => $this->faker->randomNumber(3, true),
			'deaths'    => $this->faker->randomNumber(3, true),
		];
	}
}
