<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Souvenir extends Model
{
    use HasFactory;

    protected $fillable = [
        'kantong_id',
        'json_id',
        'nama',
        'jumlah',
        'harga',
        'catatan',
        'berat_gram',
        'total_harga',
        'total_berat',
        'souv_id'
    ];

    public function kantong()
    {
        return $this->belongsTo(Kantong::class, 'kantong_id', 'id');
    }
}
