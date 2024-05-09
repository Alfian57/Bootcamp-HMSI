<?php

namespace Database\Factories;

use App\Enums\ProductCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word,
            'description' => $this->faker->sentence,
            'price' => $this->faker->numberBetween(1000, 10000),
            'category' => $this->faker->randomElement([ProductCategory::ELECTRONIC->value, ProductCategory::COMPUTER->value]),
            'weight' => $this->faker->numberBetween(1, 100),
            'stock' => $this->faker->numberBetween(0, 100),
            'image' => null,
        ];
    }
}