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

                        default:
                            // tampilkan list biasa
                            return $this->d_view_default();
                            break;
                    }
                }
                break;

            case 'add':
                switch ($object) {
                    case 'dokumen':
                        return $this->d_view_add_dokumen($uid);
                        break;

                    case 'peserta':
                        return $this->d_view_add_peserta($uid);
                        break;

                    default:
                        // tampilkan list biasa
                        return $this->d_view_default();
                        break;
                }
                break;

            case 'detail':
                switch($object) {
                    case 'peserta':
                        return $this->d_view_detail_peserta($uid);
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
        // return view('be.d.peserta.list', [
        return view('container.list-peserta', [
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
        // return view('be.d.peserta.add');
        return view('container.add-peserta');
    }

    protected function d_view_edit_peserta($uid)
    {
        $p = Peserta::where('uid', $uid)->first();
        // return view('be.d.peserta.edit', [
        return view('container.edit-peserta', [
            'data' => $p
        ]);
    }

    public function d_view_add_dokumen($uid)
    {
        $data = Peserta::where('uid', $uid)->first();
        return view('be.d.peserta.add-dokumen', [
            'data' => $data,
        ]);
    }

    public function d_view_detail_peserta($uid)
    {
        $p = Peserta::where('uid', $uid)->first();
        return view('container.detail-peserta', [
            'data' => $p
        ]);
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

                    default:
                        return $this->error_page();
                        break;
                }
                break;
            case 'edit':
                switch ($object) {
                    case 'peserta':
                        return $this->d_action_edit_peserta($request, $uid);
                        break;

                    default:
                        return $this->error_page();
                        break;
                }
                break;

            case 'add':
                switch ($object) {
                    case 'dokumen':
                        return $this->d_action_add_dokumen($request, $uid);
                        break;

                    case 'peserta':
                        return $this->d_action_add_peserta($request);
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
        $rules = [
            'email' => 'required|email',
            'nama' => 'required|string',
            'jabatan' => 'required',
            'handphone' => 'required|min:10',
            'ktp' => 'required|file|mimes:png,jpg,jpeg',
            'pas' => 'required|file|mimes:png,jpg,jpeg',
            'line' => 'required'
        ];

        Validator::make($request->all(), $rules, $messages = $this->msg)->validate();

        $u = Auth::user();

        if ($request->hasFile('pas')) {
            $foto_url = join("_", [time(), join('-', explode(' ', $request->nama)), "foto"])  . "." . $request->pas->extension();
            $request->pas->storeAs('public', $foto_url);
        }

        if ($request->hasFile('ktp')) {
            $ktp_url = join("_", [time(), join('-', explode(' ', $request->nama)), "ktp"])  . "." . $request->ktp->extension();
            $request->ktp->storeAs('public', $ktp_url);
        }

        Peserta::create([
            'nama' => $request->nama,
            'user_id' => $u->id,
            'jabatan' => $request->jabatan,
            'handphone' => $request->handphone,
            'line' => $request->line,
            'email' => $request->email,
            'foto_url' => $foto_url,
            'ktp_url' => $ktp_url,
            'uid' => join('-', [
                Str::random(10),
                join('-', explode(" ", $request->nama))
            ])
        ]);

        return redirect()->route('peserta', [
            'mode' => 'list',
            'object' => 'peserta'
        ])->with([
            'success' => 'Anda berhasil menambahkan ' . $request->nama,
            'success-title' => 'Berhasil Menambahkan Peserta!'
    ]);

        return 'add peserta';
    }

    protected function d_action_edit_peserta(Request $request, $uid)
    {
        // dd($request->all());

        $rules = [
            'email' => 'required|email',
            'nama' => 'required|string|min:5',
            'jabatan' => 'required',
            'handphone' => 'required',
            'line' => 'required',
            'ktp' => 'mimes:png,jpg,jpeg'
        ];

        Validator::make($request->all(), $rules, $this->msg)->validate();

        $p = Peserta::where('uid', $uid)->first();
        if (!$p) {
            # code...
        }

        if ($p->email != $request->email)
            $p->email = $request->email;

        if ($p->nama != $request->nama) {
            $p->nama = $request->nama;

            if ($p->jabatan == 'ketua') {
                User::find(Auth::user()->id)->update([
                    'nama' => $request->nama
                ]);
            }
        }

        if ($p->jabatan != $request->jabatan)
            $p->jabatan = $request->jabatan;

        if ($p->handphone != $request->handphone)
            $p->handphone = $request->handphone;

        if ($p->alergi != $request->alergi)
            $p->alergi = $request->alergi;

        $vegan = $request->vegan == 'yes' ? true : false;
        if ($p->vegan != $vegan)
            $p->vegan = $vegan;

        if ($request->pas) {
            $foto_url = join("_", [time(), join('-', explode(' ', $request->nama)), "foto"])  . "." . $request->pas->extension();
            $request->pas->storeAs('public', $foto_url);
            $p->foto_url = $foto_url;
        }

        if ($request->ktp) {
            $ktp_url = join("_", [time(), join('-', explode(' ', $request->nama)), "ktp"])  . "." . $request->ktp->extension();
            $request->ktp->storeAs('public', $ktp_url);
            $p->ktp_url = $ktp_url;
        }

        $p->save();

        return redirect()->route('peserta', [
            'mode' => 'list',
            'object' => 'peserta'
        ])->with([
            'success' => 'Anda berhasil memperbarui data ' . $p->nama,
            'success-title' => 'Berhasil Memperbarui!'
        ]);
        // return 'edit peserta - ' . $uid;
    }

    protected function d_action_delete_peserta($uid)
    {
        $p = Peserta::where('uid', $uid);
        $p->delete();
        return redirect()->route('peserta', [
            'mode' => 'list',
            'object' => 'peserta'
        ])->with([
            'success' => 'Anda berhasil menghapus ' . $uid,
            'success-title' => 'Berhasil Menghapus!'
            ]);
    }

    protected function d_action_add_dokumen(Request $request, $uid)
    {
        // dd($request);

        $p = Peserta::where('uid', $uid)->first();

        if ($request->doc_izin) {
            $doc_izin_url = join("_", [
                time(),
                join('-', explode(' ', $p->nama)),
                "surat_izin_orang_tua"
            ])  . "." . $request->doc_izin->extension();
            $request->doc_izin->storeAs('public', $doc_izin_url);
            $p->doc_izin = $doc_izin_url;
        }

        if ($request->doc_vaksin) {
            $doc_vaksin_url = join("_", [
                time(),
                join('-', explode(' ', $p->nama)),
                "surat_izin_orang_tua"
            ])  . "." . $request->doc_vaksin->extension();
            $request->doc_vaksin->storeAs('public', $doc_vaksin_url);
            $p->doc_vaksin = $doc_vaksin_url;
        }

        if ($request->doc_pernyataan) {
            $doc_pernyataan_url = join("_", [
                time(),
                join('-', explode(' ', $p->nama)),
                "surat_izin_orang_tua"
            ])  . "." . $request->doc_pernyataan->extension();
            $request->doc_pernyataan->storeAs('public', $doc_pernyataan_url);
            $p->doc_pernyataan = $doc_pernyataan_url;
        }

        $p->save();

        return redirect()->route('peserta', [
            'mode' => 'add',
            'object' => 'dokumen',
            'uid' => $uid
        ]);
    }

    protected function error_page()
    {
        return 'error page';
    }
}
