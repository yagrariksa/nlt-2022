<?php

namespace Database\Seeders;

use App\Models\Absen;
use App\Models\Peserta;
use Illuminate\Database\Seeder;

class AbsenSeeder extends Seeder
{
    public function run()
    {
        foreach (Peserta::get() as $p) {
            if (rand(1, 10) > 5) {
                Absen::create([
                    'peserta_id' => $p->id,
                    'bukti' => 'Screen Shot 2022-03-27 at 21.09.26.png'
                ]);
            }
        }
    }
}
