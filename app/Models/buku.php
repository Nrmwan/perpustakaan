<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class buku extends Model
{
    use HasFactory;
    protected $table = "buku";
    protected $primaryKey = "bukuID";
    protected $fillable = [
        'bukuID',
        'judul',
        'cover',
        'penulis',
        'penerbit',
        'tahunTerbit',
        'stok',
    ];

    public function kategories(): BelongsToMany
    {

        return $this->belongsToMany(kbuku::class, 'kategoribuku_relasi', 'bukuID', 'kategoriID');
    }

    public function down(): void
    {
        Schema::table('kategoribuku_relasi', function (Blueprint $table) {
            $table->foreign('bukuID')
            ->references('bukuID')->on('buku')
            ->onDelete('cascade'); // Menentukan aksi cascading pada penghapusan
        });
    }

    // data yang mau di panggil
    // public function nama_tabel()
    // {
    // return $this-BelongsTo(models::class)
    // }

    // data yang di panggil
    // public function nama_tabel()
    // {
    // return $this-HasMany(models::class)
    // }
}
