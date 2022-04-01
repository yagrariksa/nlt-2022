<?php

namespace App\Models;

use DateTime;
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
        $expstart = explode(' ', $start);
        $expend = explode(' ', $end);
        $d = Absen::where('peserta_id', $this->id)
            ->whereDate('created_at', $expstart[0])
            ->whereTime('created_at', '>', $expstart[1])
            ->whereTime('created_at', '<', $expend[1])
            ->first();
        if ($d) {
            return 'sudah-absen';
        } else {
            $current_time = date("Y-m-d H:i");
            $sunrise = $start;
            $sunset = $end;
            $date1 = DateTime::createFromFormat('Y-m-d H:i', $current_time);
            $date2 = DateTime::createFromFormat('Y-m-d H:i', $sunrise);
            $date3 = DateTime::createFromFormat('Y-m-d H:i', $sunset);
            if (
                $date1 > $date2
                && $date1 < $date3
            ) {
                return 'absen-sekarang';
            } else if (
                $date1 < $date2
            ) {
                return 'belum-saatnya-absen';
            } else {
                return 'tidak-absen';
            }
        }
    }
}
