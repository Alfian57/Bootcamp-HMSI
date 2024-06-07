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

    public function configure(): static
    {
        return $this->afterCreating(function (\App\Models\PurchaseItem $purchaseItem) {
            $purchaseItem->purchase->update([
                'total_price' => $purchaseItem->purchase->total_price + $purchaseItem->total_price * $purchaseItem->quantity,
                'total_weight' => $purchaseItem->purchase->total_weight + $purchaseItem->product->weight * $purchaseItem->quantity,
            ]);
        });
    }
}
