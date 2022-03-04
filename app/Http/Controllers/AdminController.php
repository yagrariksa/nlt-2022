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
        $uid = $request->query('uid');

        switch ($object) {
            case 'univ':
                return $this->a_view_list_univ($request);

            case 'peserta':
                if ($univ) {
                    return $this->a_view_list_peserta_by_univ($univ);
                } else if($uid) {
                    return $this->a_view_detail_peserta($uid);
                }else {
                    return $this->a_view_list_peserta_all();
                }
                break;

            default:
                return $this->a_view_list_univ($request);
                break;
        }
    }

    protected function a_view_list_univ(Request $request)
    {
        $data  = User::with('peserta')->get();

        // dd($data);
        // dd($data);
        // return view('be.a.list-univ', [
        return view('container.admin.dashboard', [
            'data' => $data
        ]);
    }

    protected function a_view_list_peserta_by_univ($univ)
    {
        $data = User::with(['peserta'])->where('email', $univ)->first();
        $data = $data->peserta;
        // return view('be.a.list-peserta', [
        return view('container.admin.list-peserta-univ', [
            'data' => $data
        ]);
    }

    protected function a_view_list_peserta_all()
    {
        $data = Peserta::with('univ')->get();
        // return view('be.a.list-peserta-all', [
        return view('container.admin.list-peserta-all', [
            'data' => $data
        ]);
    }

    protected function a_view_detail_peserta($uid)
    {
        $data = Peserta::where('uid', $uid)->first();
        return view('container.admin.detail-peserta', [
            'data' => $data
        ]);
    }

    protected function a_view_list_travel_by_univ($univ)
    {
        $data = User::with(['peserta', 'peserta.datang', 'peserta.pergi'])->where('email', $univ)->first();
        return 'list travel univ';
    }

    // protected function a_view_list_travel_all()
    // {
    //     $data = TravelDatang::get();
    //     $data2 = TravelPergi::get();
    //     return 'list travel all';
    // }
}
