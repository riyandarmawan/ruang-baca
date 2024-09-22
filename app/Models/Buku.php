<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\GenerateUniqueSlugTrait;

class Buku extends Model
{
    use HasFactory;
    use SoftDeletes;
    use GenerateUniqueSlugTrait;

    protected $primaryKey = 'kode_buku';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $guarded = [];

    public function kategori(): BelongsTo 
    {
        return $this->belongsTo(Kategori::class)->withTrashed();
    }

    public function peminjamans(): BelongsToMany 
    {
        return $this->belongsToMany(Peminjaman::class, 'detail_peminjaman', 'kode_buku', 'id_peminjaman')->withPivot('jumlah')->withPivot('id');
    }

    public function pengembalians(): BelongsToMany
    {
        return $this->belongsToMany(Pengembalian::class, 'detail_pengembalian', 'kode_buku', 'id_pengembalian')->withPivot('jumlah')->withPivot('id');
    }
}
