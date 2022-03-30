<?php

namespace Database\Seeders;

use App\Models\Barang;
use App\Models\Kantong;
use App\Models\Souvenir;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SouvenirSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 10; $i++) {
            $u = User::inRandomOrder()->limit(1)->first();
            Kantong::create([
                'nama' => Str::random(10),
                'alamat' => join(' ', [Str::random(5), Str::random(10), Str::random(7),]),
                'invoice_url' => null, 'total_ongkir' => 0,
                'user_id' => $u->id,
                'kid' => Str::random(5) . '-' . join('-', explode(' ', Str::random(rand(5, 15))))
            ]);
        }
        for ($i = 0; $i < 50; $i++) {
            $k = Kantong::inRandomOrder()->limit(1)->first();
            $b = Barang::inRandomOrder()->limit(1)->first();
            $jumlah = rand(1, 100);
            while ($k->souv_checker($b->bar_id)) {
                $b = Barang::inRandomOrder()->limit(1)->first();
            }
            Souvenir::create([
                "json_id" => $b->bar_id,
                "nama" => $b->nama,
                "jumlah" => $jumlah,
                "harga" => $b->harga,
                "berat_gram" => $b->berat,
                "kantong_id" => $k->id,
                "catatan" => join(' ', [Str::random(5), Str::random(10), Str::random(7),]),
                "total_harga" => $b->harga * $jumlah,
                "total_berat" => $b->berat * $jumlah,
                "souv_id" => Str::random(5) . '-' . join('-', explode(' ', $b->nama))
            ]);
        }
    }
}
