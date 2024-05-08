<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Enums\Gender;
use App\Models\Pembelian;
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
            'nama_lengkap' => 'Alfian Gading Saputra',
            'email' => 'alfian.admin@gmail.com',
            'password' => Hash::make('password'),
            'jenis_kelamin' => Gender::MALE->value,
            'tanggal_lahir' => '2004-09-10',
            'no_telepon' => '0895363116378',
            'is_active' => true,
            'is_admin' => true,
        ]);

        User::factory()->count(10)->create();
        Pembelian::factory()->count(10)->create();
    }
}
