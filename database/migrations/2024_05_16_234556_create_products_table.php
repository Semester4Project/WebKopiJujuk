<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id('id_product'); // Primary key
            $table->string('nama_produk'); // Nama produk
            $table->unsignedBigInteger('id_kategori'); // Kolom id_kategori yang akan menjadi foreign key
            $table->text('deskripsi')->nullable(); // Deskripsi produk
            $table->integer('berat'); // Berat produk
            $table->integer('harga'); // Harga produk
            $table->string('foto')->nullable(); // Foto produk
            $table->timestamps(); // Created_at dan updated_at
            
            // Definisi foreign key
            $table->foreign('id_kategori')->references('id_kategori')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products'); // Menghapus tabel 'products'
    }
}