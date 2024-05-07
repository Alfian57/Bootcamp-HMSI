<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Produk extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_produk';

    protected $table = 'produk';

    protected $guarded = 'id_produk';

    public function item(): HasMany
    {
        return $this->hasMany(Item::class);
    }
}
