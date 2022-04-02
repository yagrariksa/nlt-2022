<?php

namespace App\Exports;

use App\Models\Peserta;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class AbsensiExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public $jadwal;

    public function __construct($jadwal)
    {
        $this->jadwal = $jadwal;
    }
    public function view(): View
    {
        $p = Peserta::get();
        return view('excel.absensi', [
            'peserta' => $p,
            'jadwal' => $this->jadwal
        ]);
    }
}
