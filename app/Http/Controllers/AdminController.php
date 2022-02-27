<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use App\Models\TravelDatang;
use App\Models\TravelPergi;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function a_view(Request $request)
    {
        $mode = $request->query('mode');
        $object = $request->query('object');
        $univ = $request->query('univ');
        $peserta = $request->query('peserta');

        switch ($object) {
            case 'univ':
                return $this->a_view_list_univ($request);

            case 'peserta':
                if ($univ) {
                    return $this->a_view_list_peserta_by_univ($univ);
                } else {
                    return $this->a_view_list_peserta_all();
                }
                break;

            case 'travel':
                if ($univ) {
                    return $this->a_view_list_travel_by_univ($univ);
                } else {
                    return $this->a_view_list_travel_all();
                }
                break;

            default:
                return $this->a_view_list_univ($request);
                break;
        }
    }

    protected function a_view_list_univ(Request $request)
    {
        $data  = User::paginate(10)->withQueryString();

        // dd($data);
        // dd($data);
        return view('be.a.list-univ', [
            'data' => $data
        ]);
    }

    protected function a_view_list_peserta_by_univ($univ)
    {
        $data = User::with(['peserta'])->where('email', $univ)->first();
        $data = $data->peserta;
        return view('be.a.list-peserta', [
            'data' => $data
        ]);
    }

    protected function a_view_list_peserta_all()
    {
        $data = Peserta::with('univ')->paginate(10);
        return view('be.a.list-peserta-all', [
            'data' => $data
        ]);
    }

    protected function a_view_list_travel_by_univ($univ)
    {
        $data = User::with(['peserta', 'peserta.datang', 'peserta.pergi'])->where('email', $univ)->first();
        return 'list travel univ';
    }

    protected function a_view_list_travel_all()
    {
        $data = TravelDatang::get();
        $data2 = TravelPergi::get();
        return 'list travel all';
    }
}
