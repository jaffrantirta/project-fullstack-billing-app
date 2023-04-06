<?php

namespace Database\Factories;

use App\Models\PaymentMethod;
use App\Models\Provider;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Withdraw>
 */
class WithdrawFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'provider_id' => Provider::factory(),
            'payment_method' => PaymentMethod::factory(),
            'status' => $this->faker->randomElement([1, 2, 3]),
            'grand_total' => $this->faker->randomFloat(2, 0, 1000),
        ];
    }
}
