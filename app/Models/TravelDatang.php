<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TravelDatang extends Model
{
    use HasFactory;

    protected $table = 'travel_datang';

    protected $fillable = [
        'transportasi',
        'lokasi', 'tanggal', 'jam',
        'bantuan', 'peserta_id'
    ];

    public function peserta()
    {
        return $this->belongsTo(Peserta::class, 'peserta_id','id');
    }
}
