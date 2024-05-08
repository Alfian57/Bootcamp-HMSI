<?php

namespace Database\Factories;

use App\Enums\StatusPembelian;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pembelian>
 */
class PembelianFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'waktu_pembelian' => $this->faker->time(),
            'total_harga_pembelian' => $this->faker->numberBetween(100, 1000),
            'total_berat' => $this->faker->numberBetween(1, 10),
            'status_pembelian' => $this->faker->randomElement([
                StatusPembelian::BELUM_BAYAR->value,
                StatusPembelian::SUDAH_BAYAR->value,
                StatusPembelian::SEDANG_DIKIRIM->value,
                StatusPembelian::SELESAI->value,
                StatusPembelian::BATAL->value,
            ]),
            'id_user' => $this->faker->randomElement(\App\Models\User::pluck('id_user')->where('is_admin', false)->toArray()),
        ];
    }

    public function configure(): static
    {
        return $this->afterCreating(function (\App\Models\Pembelian $pembelian) {
            \App\Models\Item::factory()->count(rand(0, 10))->create([
                'id_pembelian' => $pembelian->id_pembelian,
            ]);
        });
    }
}
