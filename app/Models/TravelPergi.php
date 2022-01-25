<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TravelPergi extends Model
{
    use HasFactory;

    protected $table = 'travel_pergi';

    protected $fillable = [
        'transportasi',
        'lokasi', 'tanggal', 'jam',
        'bantuan', 'peserta_id', 'city_tour'
    ];

    public function peserta()
    {
        return $this->belongsTo(Peserta::class, 'peserta_id','id');
    }
}
