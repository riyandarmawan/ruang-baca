<?php

namespace App\Models;

use App\Traits\GenerateUniqueSlugTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kategori extends Model
{
    use HasFactory;
    use SoftDeletes;
    use GenerateUniqueSlugTrait;

    protected $guarded = [];

    protected $with = ['bukus'];

    // Event for cascading soft deletes
    protected static function booted()
    {
        static::deleting(function ($kategori) {
            if ($kategori->isForceDeleting()) {
                // If force deleting the kategori, force delete related bukus
                $kategori->bukus()->forceDelete();
            } else {
                // Soft delete related bukus
                $kategori->bukus()->delete();
            }
        });

        static::restoring(function ($kategori) {
            // Restore related bukus when the kategori is restored
            $kategori->bukus()->withTrashed()->restore();
        });
    }

    public function bukus(): HasMany
    {
        return $this->hasMany(Buku::class);
    }
}
