<?php

return [
    'index' => [
        'title' => 'Pembelian',
        'page-title' => 'Daftar Pembelian',
        'create-button' => 'Tambah Pembelian',
    ],
    'create' => [
        'title' => 'Tambah Pembelian',
        'page-title' => 'Tambah Pembelian',
        'success-message' => 'Pembelian berhasil ditambahkan',
    ],
    'edit' => [
        'title' => 'Edit Pembelian',
        'page-title' => 'Edit Pembelian',
        'success-message' => 'Pembelian berhasil diperbarui',
    ],
    'datatable' => [
        'column' => [
            'customer-name' => 'Nama Pelanggan',
            'total-price' => 'Total Harga',
            'total-weight' => 'Total Berat',
            'status' => 'Status',
            'created-at' => 'Waktu Pembelian',
            'action' => 'Aksi',
        ],
        'filter' => [
            'customer-name' => [
                'label' => 'Nama Pelanggan',
                'placeholder' => 'Cari berdasarkan nama pelanggan',
            ],
            'purchase-status' => [
                'label' => 'Kategori',
                'items' => [
                    'all' => 'Semua',
                    'unpaid' => 'Belum Dibayar',
                    'paid' => 'Sudah Dibayar',
                    'being-shipped' => 'Sedang Dikirim',
                    'completed' => 'Selesai',
                    'cancelled' => 'Dibatalkan',
                ],
            ],
            'purchase-time' => [
                'label' => 'Waktu Pembelian',
                'placeholder' => 'Cari berdasarkan waktu pembelian',
            ],
        ],
    ],
    'form' => [
        'status' => [
            'label' => 'Status Pembelian',
            'attribute' => 'Status Pembelian',
        ],
        'product' => [
            'label' => 'Nama Produk',
            'attribute' => 'Nama Produk',
        ],
        'quantity' => [
            'label' => 'Jumlah',
            'placeholder' => 'Masukan jumlah',
            'attribute' => 'Jumlah',
        ],
        'note' => [
            'label' => 'Catatan',
            'attribute' => 'Catatan',
        ],
        'add-item-button' => '+ Tambah Item',
    ],
];
