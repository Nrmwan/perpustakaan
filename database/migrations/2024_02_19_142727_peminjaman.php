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
        Schema::create('peminjaman', function (Blueprint $table) {
            $table->id('peminjamanID');
            // $table->integer('PeminjamanID');
            $table->unsignedBigInteger('userID');
            $table->unsignedBigInteger('bukuID');
            $table->date('tanggalPeminjaman');
            $table->date('batasPengembalian');
            $table->date('tanggalPengembalian', 50)->nullable();
            $table->timestamps();

            $table->foreign('userID')->references('id')->on('users');
            $table->foreign('bukuID')->references('bukuID')->on('buku');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjaman');
        Schema::table('peminjaman', function (Blueprint $table) {
            // Hapus kunci asing
            $table->dropForeign(['userID']);
            $table->dropForeign(['bukuID']);

            // Hapus kolom yang ditambahkan
            $table->dropColumn('userID');
            $table->dropColumn('bukuID');
        });
    }
};
