<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GambarBarang extends Model
{
    use HasFactory;

    protected $table = 'gambarbarangs';

    protected $fillable = [
        'url', 'bid'
    ];

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'bid', 'id');
    }
}
