<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PurchaseItem>
 */
class PurchaseItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'note' => $this->faker->sentence,
            'quantity' => $this->faker->numberBetween(1, 10),
            'total_price' => $this->faker->numberBetween(100, 1000),
            'purchase_id' => function () {
                return \App\Models\Purchase::factory()->create()->id;
            },
            'product_id' => function () {
                return \App\Models\Product::factory()->create()->id;
            },
        ];
    }
}
