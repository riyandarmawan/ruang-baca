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

    protected static function boot()
    {
        parent::boot();

        // Listen for the 'deleting' event to handle related models
        static::deleting(function ($kelas) {
            if ($kelas->isForceDeleting()) {
                // If we're force deleting the parent, force delete the children too
                $kelas->siswas()->forceDelete();
            } else {
                // Soft delete related children
                $kelas->siswas()->delete();
            }
        });

        // Listen for the 'restoring' event to restore related models
        static::restoring(function ($kelas) {
            // Restore related children when restoring the parent
            $kelas->siswas()->restore();
        });
    }

    public function siswas(): HasMany
    {
        return $this->hasMany(Siswa::class, 'kode_kelas', 'kode_kelas');
    }
}
