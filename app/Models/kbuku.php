<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class kbuku extends Model
{
    use HasFactory;
    protected $table = "kategoribuku";
    protected $primaryKey = "kategoriID";
    protected $fillable = [
        'kategoriID',
        'namaKategori',
    ];

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
