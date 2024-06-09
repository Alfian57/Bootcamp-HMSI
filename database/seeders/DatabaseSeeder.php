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
        if (File::exists(storage_path('/app/public/products'))) {
            $productImage = storage_path('/app/public/products');
            foreach (File::files($productImage) as $file) {
                File::delete($file);
            }
        } else {
            File::makeDirectory(storage_path('/app/public/products'));
        }

        if (File::exists(storage_path('/app/public/profiles'))) {
            $profilesImage = storage_path('/app/public/profiles');
            foreach (File::files($profilesImage) as $file) {
                File::delete($file);
            }
        } else {
            File::makeDirectory(storage_path('/app/public/profiles'));
        }

        $this->call([
            UserSeeder::class,
            CategorySeeder::class,
        ]);

        User::factory()->count(10)->create();
        Purchase::factory()->count(50)->create();
    }
}
