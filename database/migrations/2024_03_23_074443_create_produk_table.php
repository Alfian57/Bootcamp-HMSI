<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('produk', function (Blueprint $table) {
            $table->id('id_produk');
            $table->string('nama_produk');
            $table->string('deskripsi_produk');
            $table->unsignedInteger('harga_produk');
            $table->enum('kategori_produk', ['elektronik', 'komputer']);
            $table->unsignedSmallInteger('berat_produk');
            $table->unsignedSmallInteger('stok_produk');
            $table->string('gambar_produk')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produk');
    }
};
