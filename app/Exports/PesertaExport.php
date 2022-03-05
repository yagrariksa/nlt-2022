<?php

namespace App\Exports;

use App\Models\Peserta;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class PesertaExport implements FromView
{
    public $univ;

    function __construct($univ)
    {
        $this->univ = $univ;
    }

    public function view(): View
    {
        if ($this->univ == 'ALL') {
            $p = Peserta::get();
        } else {
            $u = User::with('peserta')->where('email', $this->univ)->first();
            $p = $u->peserta;
        }

        return view('excel.peserta', [
            'data' => $p
        ]);
        // return Peserta::all();
    }
}
