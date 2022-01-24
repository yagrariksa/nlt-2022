<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use App\Models\TravelDatang;
use App\Models\TravelPergi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class PesertaController extends Controller
{
    /**
     * untuk dashboard user
     * method MAPPING
     * DO NOT EDIT ANYTHING FROM THIS FUNCTION
     */
    public function d_view(Request $request)
    {
        $mode = $request->query('mode');
        $object = $request->query('object');
        $uid = $request->query('uid');

        switch ($mode) {
            case 'list':
                switch ($object) {
                    case 'peserta':
                        return $this->d_view_list_peserta();
                        break;

                    case 'travel':
                        return $this->d_view_list_travel();
                        break;

                    default:
                        // tampilkan list biasa
                        return $this->d_view_default();
                        break;
                }
                break;
            case 'edit':
                if (!$uid) {
                    return $this->d_view_default();
                } else {
                    switch ($object) {
                        case 'peserta':
                            return $this->d_view_edit_peserta($uid);
                            break;

                        case 'travel':
                            return $this->d_view_edit_travel($uid);
                            break;

                        default:
                            // tampilkan list biasa
                            return $this->d_view_default();
                            break;
                    }
                }
                break;

            case 'add':
                switch ($object) {
                    case 'peserta':
                        return $this->d_view_add_peserta($uid);
                        break;

                    case 'travel':
                        return $this->d_view_add_travel($uid);
                        break;

                    default:
                        // tampilkan list biasa
                        return $this->d_view_default();
                        break;
                }
                break;

            default:
                // tampilkan list biasa
                return $this->d_view_default();
                break;
        }
    }

    protected function d_view_default()
    {
        $listPeserta = Auth::user()->peserta;
        return view('be.d.peserta.list', [
            'data' => $listPeserta,
        ]);
    }

    protected function d_view_list_peserta()
    {
        return $this->d_view_default();
    }

    protected function d_view_list_travel()
    {

        // $datang = User::with(['peserta','peserta.datang'])->find(Auth::user()->id);
        // $datang = Auth::user()->peserta[0]->datang;
        // dd($datang);
        return view('be.d.travel.list');
    }

    protected function d_view_add_peserta()
    {
        return view('be.d.peserta.add');
    }

    protected function d_view_edit_peserta($uid)
    {
        return 'edit peserta - ' . $uid;
    }

    protected function d_view_add_travel()
    {
        return view('be.d.travel.add');
    }

    protected function d_view_edit_travel($uid)
    {
        return 'edit travel - ' . $uid;
    }

    /**
     * untuk form-response dari dashboard user
     * method MAPPING
     * DO NOT EDIT ANYTHING FROM THIS FUNCTION
     */
    public function d_action(Request $request)
    {
        $mode = $request->query('mode');
        $object = $request->query('object');
        $uid = $request->query('uid');

        if (!$mode)
            return $this->d_action_default();

        if ($mode == 'edit' | $mode == 'delete')
            if (!$uid)
                return $this->d_action_default();


        switch ($mode) {
            case 'delete':
                switch ($object) {
                    case 'peserta':
                        return $this->d_action_delete_peserta($uid);
                        break;

                    case 'travel':
                        return $this->d_action_delete_travel($uid);
                        break;

                    default:
                        return $this->error_page();
                        break;
                }
                break;
            case 'edit':
                switch ($object) {
                    case 'peserta':
                        return $this->d_action_edit_peserta($uid);
                        break;

                    case 'travel':
                        return $this->d_action_edit_travel($uid);
                        break;

                    default:
                        return $this->error_page();
                        break;
                }
                break;

            case 'add':
                switch ($object) {
                    case 'peserta':
                        return $this->d_action_add_peserta($request);
                        break;

                    case 'travel':
                        return $this->d_action_add_travel($request);
                        break;

                    default:
                        return $this->error_page();
                        break;
                }
                break;

            default:
                return $this->error_page();
                break;
        }
    }

    protected function d_action_default()
    {
        return 'list peserta';
    }

    protected function d_action_add_peserta(Request $request)
    {
        // dd($request);

        $rules = [
            'email' => 'required|email',
            'nama' => 'required|string',
            'handphone' => 'required|min:10',
            'ktp' => 'required|file|mimes:png,jpg,jpeg',
            'pas' => 'required|file|mimes:png,jpg,jpeg',
            'vegan' => 'required'
        ];

        Validator::make($request->all(), $rules, $messages = $this->msg)->validate();

        $u = Auth::user();

        if ($request->hasFile('pas')) {
            $foto_url = join("_", [time(), $request->nama, "foto"])  . "." . $request->pas->extension();
            $request->pas->storeAs('public', $foto_url);
        }

        if ($request->hasFile('ktp')) {
            $ktp_url = join("_", [time(), $request->nama, "ktp"])  . "." . $request->pas->extension();
            $request->ktp->storeAs('public', $ktp_url);
        }

        Peserta::create([
            'nama' => $request->nama,
            'user_id' => $u->id,
            'jabatan' => 'ketua',
            'handphone' => $request->handphone,
            'foto_url' => $foto_url,
            'ktp_url' => $ktp_url,
            'alergi' => $request->alergi,
            'vegan' => $request->vegan == 'yes' ? true : false,
            'uid' => join('-', [
                Str::random(10),
                join('-', explode(" ", $request->nama))
            ])
        ]);

        return redirect()->route('peserta', [
            'mode' => 'list',
            'object' => 'peserta'
        ]);

        return 'add peserta';
    }

    protected function d_action_edit_peserta($uid)
    {
        return 'edit peserta - ' . $uid;
    }

    protected function d_action_delete_peserta($uid)
    {
        return 'delete peserta - ' . $uid;
    }

    protected function d_action_add_travel(Request $request)
    {
        $rules = [
            'peserta' => 'required|string',
            'lokasi' => 'required',
            'transportasi' => 'required|min:5',
            'datetime' => 'required',
            'bantuan' => 'required',
            'type' => 'required'
        ];

        Validator::make($request->all(), $rules, $messages = $this->msg)->validate();

        $p = Peserta::with(['datang', 'pergi'])->where('uid', $request->peserta)->first();

        if (!$p) {
            // peserta not found
        }

        if ($request->type == 'keberangkatan' && $p->datang) {
            return redirect()->back()->with('type', 'peserta sudah memiliki data keberangkatan');
        }else if($request->type == 'kepulangan' && $p->pergi){
            return redirect()->back()->with('type', 'peserta sudah memiliki data kepulangan');
        }

        if ($request->type == 'keberangkatan') {
            $datetime = explode('T', $request->datetime);
            TravelDatang::create([
                'transportasi' => $request->transportasi,
                'lokasi' => $request->lokasi,
                'tanggal' => join(' ', $datetime),
                'bantuan' => $request->bantuan == 'perlu' ? true : false,
                'peserta_id' => $p->id
            ]);
        } else {
            $datetime = explode('T', $request->datetime);
            TravelPergi::created([
                'transportasi' => $request->transportasi,
                'lokasi' => $request->lokasi,
                'tanggal' => join(' ', $datetime),
                'bantuan' => $request->bantuan == 'perlu' ? true : false,
                'peserta_id' => $p->id
            ]);
        }

        return redirect()->route('peserta', [
            'mode' => 'list',
            'object' => 'travel'
        ]);
    }

    protected function d_action_edit_travel($uid)
    {
        return 'edit travel - ' . $uid;
    }

    protected function d_action_delete_travel($uid)
    {
        return 'delete travel - ' . $uid;
    }

    protected function error_page()
    {
        return 'error page';
    }
}
