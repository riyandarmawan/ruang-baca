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

    protected static function boot()
    {
        parent::boot();

        // Listen for the 'deleting' event to handle related pivot records
        static::deleting(function ($pengembalian) {
            if ($pengembalian->isForceDeleting()) {
                // If force deleting, detach any related Buku records
                $pengembalian->bukus()->detach();
            } else {
                // Handle additional logic for soft delete, if needed
            }
        });

        // Listen for the 'restoring' event to restore related models
        static::restoring(function ($pengembalian) {
            // Restore related Buku records, if needed (not usually required with pivot tables)
        });
    }

    public function bukus(): BelongsToMany
    {
        return $this->belongsToMany(Buku::class, 'detail_pengembalian', 'id_pengembalian', 'kode_buku')->withPivot('jumlah')->withPivot('id');
    }

    public function siswa(): BelongsTo
    {
        return $this->belongsTo(Siswa::class, 'nisn', 'nisn');
    }
}
