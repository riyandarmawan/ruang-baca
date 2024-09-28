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

    protected static function boot()
    {
        parent::boot();

        // Handle soft delete and restore events for related Buku models
        static::deleting(function ($kategori) {
            if ($kategori->isForceDeleting()) {
                // Permanently delete related Buku models
                $kategori->bukus()->forceDelete();
            } else {
                // Soft delete related Buku models
                $kategori->bukus()->delete();
            }
        });

        static::restoring(function ($kategori) {
            // Restore related Buku models
            $kategori->bukus()->withTrashed()->restore();
        });
    }

    public function bukus(): HasMany
    {
        return $this->hasMany(Buku::class);
    }
}
