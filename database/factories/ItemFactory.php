<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'catatan' => $this->faker->sentence,
            'kuantitas' => $this->faker->numberBetween(1, 10),
            'total_harga_item' => $this->faker->numberBetween(100, 1000),
            'id_pembelian' => function () {
                return \App\Models\Pembelian::factory()->create()->id_pembelian;
            },
            'id_produk' => function () {
                return \App\Models\Produk::factory()->create()->id_produk;
            },
        ];
    }
}
