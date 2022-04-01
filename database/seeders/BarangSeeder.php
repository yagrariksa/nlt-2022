<?php

namespace Database\Seeders;

use App\Models\Barang;
use App\Models\GambarBarang;
use App\Models\Kategori;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 20; $i++) { 
            $k = Kategori::inRandomOrder()->limit(1)->first();
            $s = Str::random(5);
            Barang::create([
                'bar_id' => Str::random(5) . '-' . join('-', explode(' ', $s)),
                'nama' => $s,
                'harga' => rand(1, 100),
                'berat' => rand(1, 100),
                'desc' => join(' ', [Str::random(5), Str::random(10), Str::random(7),]),
                'kategori_id' => $k->kat_id
            ]);
        }

        foreach (Barang::get() as $barang) {
            GambarBarang::create([
                'url' => '1648626303_dftyhgbiu_barang.png',
                'bid' => $barang->id
            ]);
        }
    }
}
