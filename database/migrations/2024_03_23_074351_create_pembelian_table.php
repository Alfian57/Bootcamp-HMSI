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
        Schema::create('pembelian', function (Blueprint $table) {
            $table->uuid('id_pembelian')->primary();
            $table->time('waktu_pembelian');
            $table->unsignedBigInteger('total_harga_pembelian');
            $table->unsignedMediumInteger('total_berat');
            $table->enum('status_pembelian', ['belum bayar', 'sudah bayar', 'sedang dikirim', 'selesai', 'batal']);
            $table->uuid('id_user');
            $table->timestamps();

            $table->foreign('id_user')->references('id_user')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembelian');
    }
};
