<?php

namespace Database\Factories;

use App\Enums\Gender;
use Illuminate\Database\Eloquent\Factories\Factory;

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
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => 'password', // password
            'gender' => $this->faker->randomElement([Gender::MALE->value, Gender::FEMALE->value]),
            'date_of_birth' => $this->faker->date(max: '2005-01-01'),
            'phone_number' => $this->faker->numerify('############'),
            'photo_profile' => null,
            'is_active' => true,
            'is_admin' => $this->faker->boolean(),
            'last_login' => null,
        ];
    }
}
