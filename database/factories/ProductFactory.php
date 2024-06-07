<?php

namespace Database\Factories;

use App\Models\Category;
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
            'category_id' => $this->faker->randomElement(Category::pluck('id')),
            'weight' => $this->faker->numberBetween(1, 100),
            'stock' => $this->faker->numberBetween(0, 100),
            'image' => 'products/'.$this->faker->file('storage/app/dummy/products', 'public/storage/products', false),
        ];
    }
}
