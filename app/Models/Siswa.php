<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Siswa extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $primaryKey = 'nisn';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $guarded = [];

    protected $with = ['kelas'];

    protected static function boot()
    {
        parent::boot();

        // Listen for the 'deleting' event to handle related models
        static::deleting(function ($siswa) {
            if ($siswa->isForceDeleting()) {
                // Force delete related models if the Siswa is being permanently deleted
                $siswa->peminjaman()->forceDelete();
                $siswa->pengembalian()->forceDelete();
            } else {
                // Soft delete related models if the Siswa is being soft-deleted
                $siswa->peminjaman()->delete();
                $siswa->pengembalian()->delete();
            }
        });

        // Listen for the 'restoring' event to restore related models
        static::restoring(function ($siswa) {
            // Restore related models when the Siswa is being restored
            $siswa->peminjaman()->restore();
            $siswa->pengembalian()->restore();
        });
    }

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
        return $this->belongsTo(Kelas::class, 'kode_kelas', 'kode_kelas')->withTrashed();
    }
}
