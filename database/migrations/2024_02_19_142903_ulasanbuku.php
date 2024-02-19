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
        Schema::create('ulasanbuku', function (Blueprint $table) {
            $table->id('ulasanID');
            // $table->integer('UlasanID');
            $table->unsignedBigInteger('userID');
            $table->unsignedBigInteger('bukuID');
            $table->text('ulasan');
            $table->integer('rating');
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
        Schema::dropIfExists('ulasanbuku');
        Schema::table('ulasanbuku', function (Blueprint $table) {
            // Hapus kunci asing
            $table->dropForeign(['userID']);
            $table->dropForeign(['bukuID']);

            // Hapus kolom yang ditambahkan
            $table->dropColumn('userID');
            $table->dropColumn('bukuID');
        });
    }

};
