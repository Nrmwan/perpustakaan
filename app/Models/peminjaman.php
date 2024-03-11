<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class peminjaman extends Model
{
    public function generateRandomInteger()
    {
        $randomInteger = Str::random(); // Contoh penggunaan Str::random()
        return $randomInteger;
    }
    use HasFactory;
    protected $table = "peminjaman";
    protected $primaryKey = "peminjamanID";

    protected $fillable = [
        'userID', 'bukuID', 'tanggalPeminjaman', 'batasPengembalian'
    ];

    /**
     * Get the user that owns the peminjaman
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'userID', 'id');
    }
    public function buku(): BelongsTo
    {
        return $this->belongsTo(buku::class, 'bukuID', 'bukuID');
    }
}
