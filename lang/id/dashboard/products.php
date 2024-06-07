<?php

return [
    'index' => [
        'title' => 'Produk',
        'page-title' => 'Daftar Produk',
        'create-button' => 'Tambah Produk',
    ],
    'create' => [
        'title' => 'Tambah Produk',
        'success-message' => 'Produk berhasil ditambahkan',
    ],
    'edit' => [
        'title' => 'Edit Produk',
        'success-message' => 'Produk berhasil diperbarui',
        'form-info' => 'Masukkan gambar jika ingin mengubahnya dan biarkan kosong jika tidak ingin mengubah',
    ],
    'delete' => [
        'title' => 'Hapus Produk',
        'success-message' => 'Produk berhasil dihapus',
    ],
    'datatable' => [
        'column' => [
            'name' => 'Nama',
            'price' => 'Harga',
            'category' => 'Kategori',
            'image' => 'Gambar',
            'stock' => 'Stok',
            'weight' => 'Berat',
            'description' => 'Deskripsi',
            'action' => 'Aksi',
        ],
        'filter' => [
            'product-name' => [
                'label' => 'Nama Produk',
                'placeholder' => 'Cari berdasarkan nama produk',
            ],
            'product-category' => [
                'label' => 'Kategori',
                'placeholder' => 'Cari berdasarkan nama kategori',
            ],
        ],
    ],
    'form' => [
        'name' => [
            'label' => 'Nama Produk',
            'placeholder' => 'Masukkan nama',
            'attribute' => 'nama produk',
        ],
        'description' => [
            'label' => 'Deskripsi',
            'placeholder' => 'Masukkan deskripsi',
            'attribute' => 'deskripsi',
        ],
        'price' => [
            'label' => 'Harga (Rp)',
            'placeholder' => 'Masukkan harga (Rp)',
            'attribute' => 'harga',
        ],
        'category' => [
            'label' => 'Kategori',
            'placeholder' => 'Pilih kategori',
            'attribute' => 'kategori',
        ],
        'weight' => [
            'label' => 'Berat (Kg)',
            'placeholder' => 'Masukkan berat (Kg)',
            'attribute' => 'berat',
        ],
        'stock' => [
            'label' => 'Stok',
            'placeholder' => 'Masukkan stok',
            'attribute' => 'stok',
        ],
        'image' => [
            'label' => 'Gambar',
            'placeholder' => 'Pilih gambar',
            'attribute' => 'gambar',
        ],
        'empty-image' => [
            'label' => 'Gambar Kosong',
        ],
    ],
];
