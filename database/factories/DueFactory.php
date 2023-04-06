<?php

namespace Database\Factories;

use App\Models\Member;
use App\Models\Package;
use App\Models\Provider;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Due>
 */
class DueFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'amount' => $this->faker->randomFloat(2, 0, 1000),
            'due_date' => $this->faker->dateTimeBetween('now', '+1 year'),
            'status' => $this->faker->randomElement([1, 2, 3, 4]),
            'paid_date' => $this->faker->dateTimeBetween('now', '+1 year'),
            'provider_id' => Provider::factory(),
            'month' => $this->faker->monthName,
            'year' => $this->faker->year,
            'member_id' => Member::factory(),
            'package_id' => Package::factory(),
        ];
    }
}
