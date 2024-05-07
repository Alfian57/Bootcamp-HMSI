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
        Schema::create('item', function (Blueprint $table) {
            $table->id('id_item');
            $table->string('catatan');
            $table->unsignedSmallInteger('kuantitas');
            $table->unsignedInteger('total_harga_item');
            $table->unsignedBigInteger('id_pembelian');
            $table->unsignedBigInteger('id_produk');
            $table->timestamps();

            $table->foreign('id_pembelian')->references('id_pembelian')->on('pembelian')->onDelete('cascade');
            $table->foreign('id_produk')->references('id_produk')->on('produk')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item');
    }
};
