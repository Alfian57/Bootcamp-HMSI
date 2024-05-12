<?php

return [
    'index' => [
        'title' => 'Pengguna',
        'page-title' => 'Daftar Pengguna',
        'create-button' => 'Buat Pengguna',
    ],
    'create' => [
        'title' => 'Buat Pengguna',
        'page-title' => 'Buat Pengguna',
        'success-message' => 'Pengguna berhasil ditambahkan',
        'form-info' => 'Kredensial pengguna akan dikirimkan ke email. Jika Anda tidak mengisi password, maka akan dihasilkan secara otomatis. Password dapat diubah melalui fitur "Ubah Password" setelah berhasil login.',
    ],
    'edit' => [
        'title' => 'Edit Pengguna',
        'page-title' => 'Edit Pengguna',
        'success-message' => 'Pengguna berhasil diperbarui',
        'form-info' => 'Masukkan gambar jika ingin mengubahnya dan biarkan kosong jika tidak ingin mengubah',
    ],
    'delete' => [
        'success-message' => 'Pengguna berhasil dihapus',
    ],
    'datatable' => [
        'column' => [
            'name' => 'Nama',
            'email' => 'Email',
            'gender' => 'Jenis Kelamin',
            'photo-profile' => 'Foto Profil',
            'admin' => 'Admin',
            'action' => 'Aksi',
            'date-of-birth' => 'Tanggal Lahir',
            'phone-number' => 'Nomor Telepon',
            'last-login' => 'Tanggal Login Terakhir',
        ],
        'filter' => [
            'user-name' => [
                'label' => 'Nama Pengguna',
                'placeholder' => 'Cari berdasarkan nama pengguna',
            ],
            'user-email' => [
                'label' => 'Email Pengguna',
                'placeholder' => 'Cari berdasarkan email pengguna',
            ],
            'user-gender' => [
                'label' => 'Jenis Kelamin',
                'items' => [
                    'all' => 'Semua',
                    'male' => 'Laki-laki',
                    'female' => 'Perempuan',
                ],
            ],
            'user-is-admin' => [
                'label' => 'Admin',
                'items' => [
                    'all' => 'Semua',
                    'admin' => 'Ya',
                    'buyer' => 'Tidak',
                ],
            ],
        ],
    ],
    'form' => [
        'email' => [
            'label' => 'Email',
            'placeholder' => 'Masukkan email',
        ],
        'name' => [
            'label' => 'Nama Pengguna',
            'placeholder' => 'Masukkan nama',
        ],
        'gender' => [
            'label' => 'Jenis Kelamin',
            'placeholder' => 'Pilih jenis kelamin',
        ],
        'is-admin' => [
            'label' => 'Peran',
            'placeholder' => 'Pilih peran',
            'items' => [
                'admin' => 'Admin',
                'buyer' => 'Pembeli',
            ],
        ],
        'is-active' => [
            'label' => 'Status Akun',
            'placeholder' => 'Pilih status akun',
            'items' => [
                'active' => 'Aktif',
                'inactive' => 'Nonaktif',
            ],
        ],
        'date-of-birth' => [
            'label' => 'Tanggal Lahir',
            'placeholder' => 'Masukkan tanggal lahir',
        ],
        'phone-number' => [
            'label' => 'Nomor Telepon',
            'placeholder' => 'Masukkan nomor telepon',
        ],
        'photo-profile' => [
            'label' => 'Foto Profil',
            'placeholder' => 'Pilih foto profil',
        ],
        'show-password' => [
            'label' => 'Tampilkan Password',
        ],
        'password' => [
            'label' => 'Password',
            'placeholder' => 'Masukkan password',
        ],
        'password-confirmation' => [
            'label' => 'Konfirmasi Password',
            'placeholder' => 'Masukkan konfirmasi password',
        ],
    ],
];
