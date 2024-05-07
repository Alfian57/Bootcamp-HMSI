<?php

namespace Database\Factories;

use App\Enums\KategoriProduk;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produk>
 */
class ProdukFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_produk' => $this->faker->word,
            'deskripsi_produk' => $this->faker->sentence,
            'harga_produk' => $this->faker->numberBetween(1000, 10000),
            'kategori_produk' => $this->faker->randomElement([KategoriProduk::ELEKTRONIK->value, KategoriProduk::KOMPUTER->value]),
            'berat_produk' => $this->faker->numberBetween(1, 100),
            'stok_produk' => $this->faker->numberBetween(0, 100),
            'gambar_produk' => null,
        ];
    }
}
