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
            'total_price' => 0,
            'total_weight' => 0,
            'status' => $this->faker->randomElement([
                PurchaceStatus::UNPAID->value,
                PurchaceStatus::PAID->value,
                PurchaceStatus::BEING_SHIPPED->value,
                PurchaceStatus::COMPLETED->value,
                PurchaceStatus::CANCELLED->value,
            ]),
            'user_id' => $this->faker->randomElement(\App\Models\User::where('is_admin', false)->pluck('id')->toArray()),
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }

    public function configure(): static
    {
        return $this->afterCreating(function (\App\Models\Purchase $purchase) {
            \App\Models\PurchaseItem::factory()->count(rand(2, 10))->create([
                'purchase_id' => $purchase->id,
                'created_at' => $purchase->created_at,
            ]);
        });
    }
}
