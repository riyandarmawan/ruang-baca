<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pengembalian extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    protected $with = ['bukus', 'siswa'];

    public function bukus(): BelongsToMany
    {
        return $this->belongsToMany(Buku::class, 'detail_pengembalian', 'id_pengembalian', 'kode_buku')->withPivot('jumlah')->withPivot('id');
    }

    public function siswa(): BelongsTo
    {
        return $this->belongsTo(Siswa::class, 'nisn', 'nisn');
    }
}
