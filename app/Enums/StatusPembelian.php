<?php

namespace App\Enums;

enum StatusPembelian: string
{
    case BELUM_BAYAR = 'belum bayar';
    case SUDAH_BAYAR = 'sudah bayar';
    case SEDANG_DIKIRIM = 'sedang dikirim';
    case SELESAI = 'selesai';
    case BATAL = 'batal';
}
