<?php

return [
    'index' => [
        'title' => 'Pembelian',
        'page-title' => 'Daftar Pembelian',
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
];
