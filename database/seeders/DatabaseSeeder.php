<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Purchase;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $profilesImage = storage_path('/app/public/products');
        foreach (File::files($profilesImage) as $file) {
            File::delete($file);
        }

        $profilesImage = storage_path('/app/public/profiles');
        foreach (File::files($profilesImage) as $file) {
            File::delete($file);
        }

        $this->call([
            UserSeeder::class,
            CategorySeeder::class,
        ]);

        User::factory()->count(10)->create();
        Purchase::factory()->count(10)->create();
    }
}
