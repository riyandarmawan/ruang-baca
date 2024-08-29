<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $primaryKey = 'kode_kelas';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $guarded = [];
}
