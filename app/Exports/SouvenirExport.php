<?php

namespace App\Exports;

use App\Models\Kantong;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class SouvenirExport implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        $k = Kantong::get();
        return view('excel.souvenir', [
            'kantong' => $k,
        ]);
    }
}
