<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kantong extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama', 'jumlah', 'total_harga',
        'total_berat_gram', 'alamat',
        'invoice_url', 'total_ongkir',
        'user_id', 'kid',
        'penerima', 'no', 'bukti_ongkir',
    ];

    public function souvenir()
    {
        return $this->hasMany(Souvenir::class, 'kantong_id', 'id');
    }

    public function univ()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function souv_total()
    {
        $a = 0;
        $b = 0;
        $c = 0;
        foreach ($this->souvenir as $s) {
            $a += $s->jumlah;
            $b += $s->total_harga;
            $c += $s->total_berat;
        }

        return [
            'jumlah_item' => $a,
            'total_harga' => $b,
            'total_berat' => $c
        ];
    }

    public function souv_checker($json_id)
    {
        foreach ($this->souvenir as $s) {
            if ($s->json_id == $json_id) {
                return true;
            }
        }
        return false;
    }
}
