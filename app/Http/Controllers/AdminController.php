<?php

namespace App\Http\Controllers;

use App\Exports\PesertaExport;
use App\Models\Peserta;
use App\Models\Sertif;
use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

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
                    if ($mode) {
                        return $this->a_view_list_peserta_by_univ_all($univ);
                    } else {
                        return $this->a_view_list_peserta_by_univ($univ);
                    }
                } else if ($mode) {
                    return $this->a_view_list_peserta_all_full();
                } else {
                    return $this->a_view_list_peserta_all();
                }
                break;

            case 'excel':
                if ($univ) {
                    return $this->a_excel_peserta_by_univ($univ);
                } else {
                    return $this->a_excel_peserta_all();
                }

            case 'sertif':
                return $this->a_view_add_excel($univ);
                break;
            default:
                return $this->a_view_list_univ($request);
                break;
        }
    }

    protected function a_view_list_univ(Request $request)
    {
        $data  = User::with('peserta')->get();
        $jmlPeserta = Peserta::count();
        // dd($data);
        // dd($data);
        // return view('be.a.list-univ', [
        return view('container.admin.dashboard', [
            'data' => $data,
            'jmlPeserta' => $jmlPeserta
        ]);
    }

    protected function a_view_add_excel($univ)
    {
        $u = User::where('email', $univ)->first();
        return view('be.a.sertif', [
            'univ' => $u
        ]);
    }

    protected function a_view_list_peserta_by_univ($univ)
    {
        $data = User::with(['peserta', 'sertif'])->where('email', $univ)->first();
        $univ = $data->univ;
        $akronim = $data->akronim;
        $email = $data->email;
        $sertif = $data->sertif;
        $data = $data->peserta;
        // return view('be.a.list-peserta', [
        return view('container.admin.list-peserta-univ', [
            'data' => $data,
            'univ' => $univ,
            'akronim' => $akronim,
            'email' => $email,
            'sertif' => $sertif
        ]);
    }

    protected function a_view_list_peserta_by_univ_all($univ)
    {
        $data = User::with(['peserta'])->where('email', $univ)->first();
        $univ = $data->univ;
        $akronim = $data->akronim;
        $email = $data->email;
        $data = $data->peserta;
        return view('container.admin.list-peserta-univ-all', [
            'data' => $data,
            'univ' => $univ,
            'akronim' => $akronim,
            'email' => $email
        ]);
    }

    protected function a_view_list_peserta_all()
    {
        $data = Peserta::with('univ')->get();
        $jmlPeserta = Peserta::count();
        $jmlUniv = User::count();
        // return view('be.a.list-peserta-all', [
        return view('container.admin.list-peserta-all', [
            'data' => $data,
            'jmlPeserta' => $jmlPeserta,
            'jmlUniv' => $jmlUniv
        ]);
    }

    protected function a_view_list_peserta_all_full()
    {
        $data = Peserta::with('univ')->get();
        $jmlPeserta = Peserta::count();
        $jmlUniv = User::count();
        return view('container.admin.list-peserta-all-full', [
            'data' => $data,
            'jmlPeserta' => $jmlPeserta,
            'jmlUniv' => $jmlUniv
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

    protected function a_excel_peserta_by_univ($univ)
    {

        $u = User::where('email', $univ)->first();
        // return Excel::download(new PesertaExport($univ), 'Response.xlsx');
        return Excel::download(new PesertaExport($univ), $u->akronim . '_Peserta_' . date('H-i_d-M') . '.xlsx');
    }

    protected function a_excel_peserta_all()
    {
        return Excel::download(new PesertaExport('ALL'), 'all-data_Peserta_' . date('H-i_d-M') . '.xlsx');
    }

    public function submit(Request $request)
    {
        switch ($request->query('mode')) {
            case 'upload-sertif':
                $u = User::where('email', $request->email)->first();

                foreach ($request->file('image') as $imagefile) {
                    $foto_url = join(
                        "_",
                        [
                            time(),
                            "sertif",
                            join('-', explode(' ', $imagefile->getClientOriginalName())),
                        ]
                    );
                    $imagefile->storeAs('public', $foto_url);
                    Sertif::create([
                        'filename' => $foto_url,
                        'univ_id' => $u->id
                    ]);
                }

                return redirect()->route('a.peserta', [
                    'object' => 'peserta',
                    'univ' => $u->email
                ]);
                break;

            case 'delete-sertif':
                Sertif::find($request->image)->delete();
                return redirect()->back();
                break;

            default:
                return redirect()->route('a.peserta', [
                    'object' => 'peserta'
                ]);
                break;
        }
    }
}
