<?php

namespace Database\Factories;

use App\Enums\PurchaceStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Purchase>
 */
class PurchaseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'purchase_time' => $this->faker->time(),
            'total_price' => $this->faker->numberBetween(100000, 1000000),
            'total_weight' => $this->faker->numberBetween(1, 10),
            'status' => $this->faker->randomElement([
                PurchaceStatus::UNPAID->value,
                PurchaceStatus::PAID->value,
                PurchaceStatus::BEING_SHIPPED->value,
                PurchaceStatus::COMPLETED->value,
                PurchaceStatus::CANCELLED->value,
            ]),
            'user_id' => $this->faker->randomElement(\App\Models\User::where('is_admin', false)->pluck('id')->toArray()),
        ];
    }

    public function configure(): static
    {
        return $this->afterCreating(function (\App\Models\Purchase $purchase) {
            \App\Models\PurchaseItem::factory()->count(rand(0, 10))->create([
                'purchase_id' => $purchase->id,
            ]);
        });
    }
}
