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
        Schema::create('addresses', function (Blueprint $table) { // Ubah nama tabel menjadi 'addresses' (jamak)
            $table->bigIncrements('id_alamat');
            $table->string('nama_penerima');
            $table->string('no_telepon'); // Menggunakan string untuk nomor telepon
            $table->string('kode_pos'); // Menggunakan string untuk kode pos
            $table->text('alamat_lengkap'); // Menggunakan snake_case untuk nama kolom
            $table->unsignedBigInteger('user_id'); // Mengacu ke id_user di tabel users
            $table->timestamps();

            // Mendefinisikan foreign key constraint dengan nama kolom yang benar
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade'); // Mengacu ke kolom 'id_user' di tabel users
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};