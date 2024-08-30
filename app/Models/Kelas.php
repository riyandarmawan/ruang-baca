<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kelas extends Model
{
    use HasFactory;

    protected $primaryKey = 'kode_kelas';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $guarded = [];

    public function siswas(): HasMany
    {
        return $this->hasMany(Siswa::class, 'kode_kelas', 'kode_kelas');
    }
}
