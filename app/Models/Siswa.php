<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Siswa extends Model
{
    use HasFactory;

    protected $primaryKey = 'nisn';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $guarded = [];

    public function peminjaman(): HasMany
    {
        return $this->hasMany(Peminjaman::class, 'nisn', 'nisn');
    }

    public function pengembalian(): HasMany
    {
        return $this->hasMany(Pengembalian::class, 'nisn', 'nisn');
    }

    public function kelas(): BelongsTo
    {
        return $this->belongsTo(Kelas::class, 'kode_kelas', 'kode_kelas');
    }
}
