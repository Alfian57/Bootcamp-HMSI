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
        Schema::create('users', function (Blueprint $table) {
            $table->id('id_user');
            $table->string('nama_lengkap', 100);
            $table->string('email')->unique();
            $table->string('password');
            $table->enum('jenis_kelamin', ['laki-laki', 'perempuan']);
            $table->date('tanggal_lahir');
            $table->string('no_telepon', 25);
            $table->string('foto_profil')->nullable();
            $table->boolean('is_active');
            $table->boolean('is_admin');
            $table->date('last_login')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
