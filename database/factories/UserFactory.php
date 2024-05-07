<?php

namespace Database\Factories;

use App\Enums\Gender;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_lengkap' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'jenis_kelamin' => $this->faker->randomElement([Gender::MALE->value, Gender::FEMALE->value]),
            'tanggal_lahir' => $this->faker->date(max: '2005-01-01'),
            'no_telepon' => $this->faker->phoneNumber(),
            'foto_profil' => null,
            'is_active' => $this->faker->boolean(),
            'is_admin' => $this->faker->boolean(),
            'last_login' => null,
        ];
    }
}
