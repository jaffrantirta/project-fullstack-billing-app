<?php

namespace Database\Factories;

use App\Models\PaymentMethod;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'grand_total' => $this->faker->randomFloat(2, 0, 1000),
            'reference_code' => $this->faker->uuid,
            'user_id' => User::factory(),
            'payment_method_id' => PaymentMethod::factory(),
            'status' => $this->faker->randomElement([1, 2, 3, 4]),
        ];
    }
}
