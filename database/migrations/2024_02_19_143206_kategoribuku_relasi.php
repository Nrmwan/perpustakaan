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
        Schema::create('kategoribuku_relasi', function (Blueprint $table) {
            $table->id('kategoriBukuID');
            // $table->integer('KategoriBukuID');
            $table->unsignedBigInteger('bukuID');
            $table->unsignedBigInteger('kategoriID');
            $table->timestamps();

            $table->foreign('bukuID')->references('bukuID')->on('buku');
            $table->foreign('kategoriID')->references('kategoriID')->on('kategoribuku');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kategoribuku_relasi');
        Schema::table('kategoribuku_relasi', function (Blueprint $table) {
            // Hapus kunci asing
            $table->dropForeign(['bukuID']);
            $table->dropForeign(['kategoriID']);

            // Hapus kolom yang ditambahkan
            $table->dropColumn('bukuID');
            $table->dropColumn('kategoriID');
        });
    }
};
