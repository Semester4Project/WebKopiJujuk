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
        Schema::create('address', function (Blueprint $table) {
            $table->id('id_alamat');
            $table->string('nama_penerima');
            $table->string('no_telepon'); // Menggunakan string untuk nomor telepon
            $table->string('kode_pos'); // Menggunakan string untuk kode pos
            $table->text('alamat_lengkap'); // Menggunakan snake_case untuk nama kolom
            $table->unsignedBigInteger('id_user'); // Mengacu ke id_user di tabel users
            $table->timestamps();

            // Mendefinisikan foreign key constraint
            $table->foreign('id_user')->references('id_user')->on('users')->onDelete('cascade'); // Mengacu ke kolom 'id_user' di tabel users
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('address');
    }
};
