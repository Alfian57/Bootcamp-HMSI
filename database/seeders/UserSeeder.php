<?php

namespace Database\Seeders;

use App\Enums\Gender;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Alfian Gading Saputra',
            'email' => 'alfian.admin@gmail.com',
            'password' => 'password',
            'gender' => Gender::MALE->value,
            'date_of_birth' => '2004-09-10',
            'phone_number' => '0895363116378',
            'is_active' => true,
            'is_admin' => true,
        ]);
    }
}
