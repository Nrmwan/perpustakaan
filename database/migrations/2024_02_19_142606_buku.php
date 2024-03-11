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
        Schema::create('buku', function (Blueprint $table) {
            $table->id('bukuID');
            // $table->integer('BukuID');
            $table->string('judul');
            $table->string('cover', 255)->nullable();
            $table->string('penulis');
            $table->string('penerbit');
            $table->date('tahunTerbit');
            $table->integer('stok')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buku');
        Schema::table('buku', function (Blueprint $table) {
            if (Schema::hasColumn('buku', 'cover')) {
                $table->dropColumn('cover');
            }
        });
    }
};
