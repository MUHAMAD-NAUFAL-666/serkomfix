<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penyewaan extends Model
{
    use HasFactory;
protected $table = 'penyewaan';
    protected $fillable = [
        'nama',
        'merek', 
        'harga_sewa',
        'tanggal_sewa',
        'status',
        'durasi',
    ];
    public function user()
{
    return $this->belongsTo(User::class);
}

}