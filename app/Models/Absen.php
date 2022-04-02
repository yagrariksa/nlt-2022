<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absen extends Model
{
    use HasFactory;

    protected $fillable = [
        'peserta_id', 'bukti'
    ];

    public function peserta()
    {
        return $this->belongsTo(Peserta::class, 'peserta_id','id');
    }

}
