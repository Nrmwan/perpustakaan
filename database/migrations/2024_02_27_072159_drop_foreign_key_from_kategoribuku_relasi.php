<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// return new class extends Migration
// {
//     /**
//      * Run the migrations.
//      */
//     public function up(): void
//     {
//         Schema::table('kategoribuku_relasi', function (Blueprint $table) {
//             //
//         });
//     }

//     /**
//      * Reverse the migrations.
//      */
//     public function down(): void
//     {
//         Schema::table('kategoribuku_relasi', function (Blueprint $table) {
//             //
//         });
//     }
// };
class DropForeignKeyFromKategoribukuRelasi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kategoribuku_relasi', function (Blueprint $table) {
            // Ganti 'kategoribuku_relasi_bukuID_foreign' dengan nama kunci asing yang sebenarnya
            $table->dropForeign('kategoribuku_relasi_bukuID_foreign');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Jika Anda perlu membuat kembali kunci asing, Anda dapat menambahkannya di sini
    }
}