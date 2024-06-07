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
    'delete' => [
        'title' => 'Hapus Pembelian',
        'success-message' => 'Pembelian berhasil dihapus',
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
            'attribute' => 'status pembelian',
        ],
        'user' => [
            'label' => 'Nama Pembeli',
            'attribute' => 'nama pembeli',
        ],
        'product' => [
            'label' => 'Nama Produk',
            'attribute' => 'nama produk',
        ],
        'quantity' => [
            'label' => 'Jumlah',
            'placeholder' => 'Masukan jumlah',
            'attribute' => 'jumlah',
        ],
        'note' => [
            'label' => 'Catatan',
            'attribute' => 'catatan',
        ],
        'add-item-button' => '+ Tambah Item',
    ],
];
