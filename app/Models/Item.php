<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Item extends Model
{
    use HasFactory, HasUuids;

    protected $primaryKey = 'id_item';

    protected $table = 'item';

    protected $guarded = ['id_item'];

    public function pembelian(): BelongsTo
    {
        return $this->belongsTo(Pembelian::class);
    }

    public function produk(): BelongsTo
    {
        return $this->belongsTo(Produk::class);
    }
}
