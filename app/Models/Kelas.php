<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kelas extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'kelases';

    protected $primaryKey = 'kode_kelas';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $guarded = [];

    // Event for cascading soft deletes
    protected static function booted()
    {
        static::deleting(function ($kelas) {
            if ($kelas->isForceDeleting()) {
                // If force deleting the kelas, force delete related siswas
                $kelas->siswas()->forceDelete();
            } else {
                // Soft delete related siswas
                $kelas->siswas()->delete();
            }
        });

        static::restoring(function ($kelas) {
            // Restore related siswas when the kelas is restored
            $kelas->siswas()->withTrashed()->restore();
        });
    }

    public function siswas(): HasMany
    {
        return $this->hasMany(Siswa::class, 'kode_kelas', 'kode_kelas');
    }
}
