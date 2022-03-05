<?php

namespace Database\Seeders;

use App\Models\Peserta;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PesertaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 50; $i++) {
            $str = Str::random(10);
            $u = User::create([
                'email' => $str,
                'univ' => $str,
                'akronim' => $str,
                'ketua' => $str,
                'password' => Hash::make($str)
            ]);
            for ($j = 0; $j < 10; $j++) {
                $sstr = Str::random(10);
                Peserta::create([
                    'nama' => $sstr,
                    'user_id' => $u->id,
                    'jabatan' => $sstr,
                    'handphone' => $sstr,
                    'foto_url' => $sstr,
                    'line' => $sstr,
                    'email' => $sstr,
                    'uid' => join('-', [
                        Str::random(10),
                        join('-', explode(" ", $sstr))
                    ])
                ]);
            }
        }
    }
}
