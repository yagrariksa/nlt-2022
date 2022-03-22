<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    use HasFactory;

    protected $table = 'pesertas';

    protected $fillable = [
        'nama', 'jabatan', 'handphone', 'line',
        'foto_url', 'user_id',  'uid', 'email',
    ];

    public function univ()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function souvenir()
    {
        return $this->hasMany(Souvenir::class, 'peserta_id', 'id');
    }

    public function absen()
    {
        return $this->hasMany(Absen::class, 'peserta_id', 'id');
    }

    public function sudahAbsen($start, $end)
    {
        $d = Absen::where('peserta_id', $this->id)
            ->where('created_at', '<', $start)
            ->where('created_at', '>', $end)
            ->first();

        return $d ? true : false;
    }
}
