<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Enums\Gender;
use App\Models\Purchase;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Alfian Gading Saputra',
            'email' => 'alfian.admin@gmail.com',
            'password' => Hash::make('password'),
            'gender' => Gender::MALE->value,
            'date_of_birth' => '2004-09-10',
            'phone_number' => '0895363116378',
            'is_active' => true,
            'is_admin' => true,
        ]);

        User::factory()->count(10)->create();
        Purchase::factory()->count(10)->create();
    }
}
