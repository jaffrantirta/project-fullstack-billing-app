<?php

namespace Database\Factories;

use App\Models\Provider;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Package>
 */
class PackageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'fee' => $this->faker->randomFloat(2, 0, 1000),
            'description' => $this->faker->text,
            'frequency' => $this->faker->randomElement([1, 12]),
            'provider_id' => Provider::factory(),
        ];
    }
}
