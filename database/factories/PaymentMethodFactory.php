<?php

namespace Database\Factories;

use App\Models\PaymentMethodCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PaymentMethod>
 */
class PaymentMethodFactory extends Factory
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
            'logo' => 'https://picsum.photos/200/300',
            'payment_method_category_id' => PaymentMethodCategory::factory(),
        ];
    }
}
