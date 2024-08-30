<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Peminjaman extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function bukus(): BelongsToMany
    {
        return $this->belongsToMany(Buku::class, 'detail_peminjaman', 'id_peminjaman', 'kode_buku');
    }

    public function siswas(): BelongsTo
    {
        return $this->belongsTo(Siswa::class, 'nisn', 'nisn');
    }
}
