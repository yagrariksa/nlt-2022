<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    use HasFactory;

    protected $table = 'pesertas';

    protected $fillable = [
        'nama', 'jabatan', 'handphone',
        'foto_url', 'ktp_url', 'alergi', 'vegan',
        'user_id', 'travel_id',  'city_tour'
    ];

    public function univ()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function datang()
    {
        return $this->hasOne(TravelDatang::class, 'peserta_id', 'id');
    }

    public function pergi()
    {
        return $this->hasOne(TravelPergi::class, 'peserta_id', 'id');
    }
}
