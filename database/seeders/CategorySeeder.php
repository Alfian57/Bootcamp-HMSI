<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Elektronik',
            'Pakaian Pria',
            'Pakaian Wanita',
            'Pakaian Anak',
            'Sepatu',
            'Tas',
            'Aksesoris Fashion',
            'Peralatan Rumah Tangga',
            'Peralatan Dapur',
            'Makanan dan Minuman',
            'Kesehatan dan Kecantikan',
            'Olahraga dan Outdoor',
            'Buku dan Alat Tulis',
            'Mainan dan Hobi',
            'Produk Bayi',
            'Otomotif',
            'Perlengkapan Kantor',
            'Peralatan Pertukangan',
            'Produk Pertanian',
            'Hewan Peliharaan',
            'Perhiasan',
            'Handphone dan Aksesoris',
            'Komputer dan Laptop',
            'Software',
            'Game dan Konsol',
        ];

        foreach ($categories as $category) {
            \App\Models\Category::create(['name' => $category]);
        }
    }
}
