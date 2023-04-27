<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AppModelsStatistic>
 */
class StatisticFactory extends Factory
{
	/**
	 * Define the model's default state.
	 *
	 * @return array<string, mixed>
	 */
	public function definition(): array
	{
		return [
			'location' => [
				'en' => $this->faker->country,
				'ka' => $this->faker->countryCode,
			],
			'deaths'    => $this->faker->numberBetween(0, 1000),
			'new_cases' => $this->faker->numberBetween(0, 1000),
			'critical'  => $this->faker->numberBetween(0, 100),
			'recovered' => $this->faker->numberBetween(0, 10000),
		];
	}
}
