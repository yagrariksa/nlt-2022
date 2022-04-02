<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'barangs';

    protected $fillable = [
        'bar_id', 'nama', 'harga',
        'berat', 'desc', 'kategori_id'
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id', 'kat_id');
    }

    public function gambar()
    {
        return $this->hasMany(GambarBarang::class, 'bid', 'id');
    }

    public function terbeli()
    {
        return $this->hasMany(Souvenir::class, 'json_id', 'bar_id');
    }

    public function terbeli_count()
    {
        $total = 0;
        $s = Souvenir::where('json_id', $this->bar_id)->get();
        foreach ($s as $souv) {
            $total += $souv->jumlah;
        }
        return $total;
    }
}
