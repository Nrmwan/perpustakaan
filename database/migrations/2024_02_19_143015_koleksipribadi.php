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
        Schema::create('koleksipribadi', function (Blueprint $table) {
            $table->id('koleksiID');
            // $table->integer('KoleksiID');
            $table->unsignedBigInteger('userID');
            $table->unsignedBigInteger('bukuID');
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
        Schema::dropIfExists('koleksipribadi');
        Schema::table('koleksipribadi', function (Blueprint $table) {
            // Hapus kunci asing
            $table->dropForeign(['userID']);
            $table->dropForeign(['bukuID']);

            // Hapus kolom yang ditambahkan
            $table->dropColumn('userID');
            $table->dropColumn('bukuID');
        });
    }


};
