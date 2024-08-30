<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Pengembalian extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function bukus(): BelongsToMany
    {
        return $this->belongsToMany(Buku::class, 'detail_pengembalian', 'id_pengembalian', 'kode_buku')->withPivot('jumlah');
    }

    public function siswa(): BelongsTo
    {
        return $this->belongsTo(Siswa::class, 'nisn', 'nisn');
    }
}
