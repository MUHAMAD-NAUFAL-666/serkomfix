<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Handphone extends Model
{
    use HasFactory;
    protected $table = 'handphone';
    protected $fillable = [
        'nama', 'merek', 'os', 'ram', 'storage', 'harga_sewa', 'status',
    ];
}
