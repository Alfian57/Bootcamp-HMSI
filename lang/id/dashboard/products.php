<?php

return [
    'index' => [
        'title' => 'Produk',
        'page-title' => 'Daftar Produk',
        'create-button' => 'Buat Produk',
    ],
    'create' => [
        'title' => 'Buat Produk',
        'page-title' => 'Buat Produk',
        'success-message' => 'Produk berhasil ditambahkan',
    ],
    'edit' => [
        'title' => 'Edit Produk',
        'page-title' => 'Edit Produk',
        'success-message' => 'Produk berhasil diperbarui',
        'form-info' => 'Masukkan gambar jika ingin mengubahnya dan biarkan kosong jika tidak ingin mengubah',
    ],
    'delete' => [
        'success-message' => 'Produk berhasil dihapus',
    ],
    'datatable' => [
        'column' => [
            'name' => 'Nama',
            'price' => 'Harga',
            'category' => 'Kategori',
            'image' => 'Gambar',
            'action' => 'Aksi',
            'stock' => 'Stok',
            'weight' => 'Berat',
            'description' => 'Deskripsi',
        ],
        'filter' => [
            'product-name' => [
                'label' => 'Nama Produk',
                'placeholder' => 'Cari berdasarkan nama produk',
            ],
            'product-category' => [
                'label' => 'Kategori',
                'items' => [
                    'all' => 'Semua',
                    'electronic' => 'Elektronik',
                    'computer' => 'Komputer',
                ],
            ],
        ],
    ],
    'form' => [
        'name' => [
            'label' => 'Nama Produk',
            'placeholder' => 'Masukkan nama',
            'attribute' => 'Nama produk',
        ],
        'description' => [
            'label' => 'Deskripsi',
            'placeholder' => 'Masukkan deskripsi',
            'attribute' => 'Deskripsi',
        ],
        'price' => [
            'label' => 'Harga',
            'placeholder' => 'Masukkan harga (Rp)',
            'attribute' => 'Harga',
        ],
        'category' => [
            'label' => 'Kategori',
            'placeholder' => 'Pilih kategori',
            'attribute' => 'Kategori',
        ],
        'weight' => [
            'label' => 'Berat',
            'placeholder' => 'Masukkan berat (Kg)',
            'attribute' => 'Berat',
        ],
        'stock' => [
            'label' => 'Stok',
            'placeholder' => 'Masukkan stok',
            'attribute' => 'Stok',
        ],
        'image' => [
            'label' => 'Gambar',
            'placeholder' => 'Pilih gambar',
            'attribute' => 'Gambar',
        ],
    ],
];
