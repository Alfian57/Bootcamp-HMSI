<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pembelian extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_pembelian';

    protected $table = 'pembelian';

    protected $guarded = 'id_pembelian';

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function item(): HasMany
    {
        return $this->hasMany(Item::class);
    }
}
