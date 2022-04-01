<?php

namespace App\Http\Controllers;

use App\Models\Absen;
use App\Models\Peserta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AbsenController extends Controller
{

    public function viewAbsen()
    {
        // Year-Month-Day Hour:Minute
        $jadwal = [
            ['2022-03-31 18:15', '2022-03-31 18:25'],
            ['2022-03-31 18:30', '2022-03-31 18:35'],
            ['2022-03-31 18:34', '2022-03-31 18:40'],
            ['2022-04-01 13:20', '2022-04-01 13:30'],
            ['2022-04-01 13:50', '2022-04-01 14:30'],
            ['2022-04-10 13:20', '2022-04-10 13:30'],
        ];
        return view('be.d.absensi.list', [
            'jadwal' => $jadwal
        ]);
        // return view('container.list-absensi');
    }

    public function doAbsen(Request $request)
    {
        $rules = [
            'bukti' => 'required|file|mimes:png,jpg,jpeg'
        ];

        Validator::make($request->all(), $rules, $this->msg)->validate();

        $p = Peserta::where('uid', $request->uid)->first();

        if ($request->hasFile('bukti')) {
            $foto_url = join(
                '_',
                [
                    time(),
                    join('-', explode(' ', $p->nama)),
                    'bukti_absen'
                ]
            ) . "." . $request->bukti->extension();
            $request->bukti->storeAs('public', $foto_url);
        }


        Absen::create([
            'peserta_id' => $p->id,
            'bukti' => $foto_url
        ]);
    }
}
