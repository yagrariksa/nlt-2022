<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kantong;
use App\Models\Kategori;
use App\Models\Souvenir;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Route;

class SouvenirController extends Controller
{
    public function d_view(Request $request)
    {
        $now = DateTime::createFromFormat('Y-m-d H:i', date('Y-m-d H:i'));
        $target = DateTime::createFromFormat('Y-m-d H:i', '2022-04-03 07:00');
        if ($now < $target) {
            return view('container.souvenir-soon');
        }
        // dd(Route::currentRouteName());
        $object = $request->query('object');
        $mode = $request->query('mode');
        $s_id = $request->query('s_id');
        $redir = $request->query('redirect');
        $kid = $request->query('kid');
        if ($redir == 'true') {
            Session::put('redir', explode(url('') . '/', url()->previous())[1]);
            return redirect()->route(Route::currentRouteName(), [
                'mode' => $mode,
                'object' => $object
            ]);
        }

        switch ($object) {
            case 'katalog':
                switch ($mode) {
                    case 'list':
                        return $this->d_view_list_souvenir($kid);
                        break;

                    case 'detail':
                        return $this->d_view_detail_souvenir($s_id);
                        break;

                    case 'edit':
                        return $this->d_view_edit_souvenir($s_id);
                        break;

                    default:
                        return $this->d_view_list_souvenir($kid);
                        break;
                }
                break;

            case 'kantong':
                switch ($mode) {
                    case 'list':
                        return $this->d_view_list_kantong();
                        break;

                    case 'add':
                        return $this->d_view_add_kantong();
                        break;

                    case 'detail':
                        return $this->d_view_detail_kantong($kid);
                        break;

                    case 'edit':
                        return $this->d_view_edit_kantong($kid);
                        break;

                    default:
                        return $this->d_view_list_kantong();
                        break;
                }
                break;

            default:
                return $this->d_view_list_souvenir($kid);
                break;
        }
    }

    protected function d_view_list_souvenir($kid)
    {
        $k = Kategori::where('parent_id', null)->get();

        if ($kid) {
            $b = Kategori::where('parent_id', null)->where('kat_id', $kid)->get();
        } else {
            $b = $k;
        }
        // query barang from kategori
        // return view('be.d.souvenir.list', [
        return view('container.list-souvenir', [
            'barang' => $b,
            'kategori' => $k
        ]);
    }

    protected function d_view_detail_souvenir($s_id)
    {
        $b = Barang::where('bar_id', $s_id)->first();
        // coba cek ini dulu, ada yang berubah 
        // return view('be.d.souvenir.detail', [
        return view('container.detail-souvenir', [
            'b' => $b
        ]);
    }

    protected function d_view_add_souvenir($s_id)
    {
        // ga kepake
        return view('be.d.souvenir.add');
    }

    protected function d_view_edit_souvenir($s_id)
    {
        $s = Souvenir::where('souv_id', $s_id)->first();
        // return view('be.d.souvenir.edit', [
        return view('container.edit-souvenir', [
            's' => $s
        ]);
    }

    protected function d_view_list_kantong()
    {
        // return view('be.d.souvenir.kantong.list');
        return view('container.keranjang');
    }

    protected function d_view_add_kantong()
    {
        // return view('be.d.souvenir.kantong.add');
        return view('container.add-keranjang');
    }

    protected function d_view_edit_kantong($kid)
    {
        $k = Kantong::where('kid', $kid)->first();
        // return view('be.d.souvenir.kantong.edit', [
        return view('container.edit-keranjang', [
            'k' => $k
        ]);
    }

    protected function d_view_detail_kantong($kid)
    {
        $k = Kantong::with('souvenir')->where('kid', $kid)->first();

        if (!$k) {
            return redirect()->route('souvenir', [
                'mode' => 'list',
                'object' => 'kantong'
            ]);
        }
        $t = false;
        $now = DateTime::createFromFormat('Y-m-d H:i', date('Y-m-d H:i'));
        $target = DateTime::createFromFormat('Y-m-d H:i', '2022-04-11 00:00');
        if ($now > $target) {
            $t = true;
        }

        // return view('be.d.souvenir.kantong.detail', [
        return view('container.detail-keranjang', [
            'k' => $k,
            'timeforpay' => $t
        ]);
    }

    public function d_action(Request $request)
    {
        $mode = $request->query('mode');
        $id = $request->query('id');
        // dd($mode);
        switch ($mode) {
            case 'add-new-item':
                return $this->d_action_add_souvenir($request);
                break;

            case 'add-new-kantong':
                return $this->d_action_add_kantong($request);
                break;

            case 'edit-my-kantong':
                return $this->d_action_edit_kantong($request);
                break;

            case 'delete-my-kantong':
                $k = Kantong::with('souvenir')->where('kid', $request->query('kid'))->first();
                foreach ($k->souvenir as $s) {
                    $s->delete();
                }
                $k->delete();
                return redirect()->route('souvenir', [
                    'mode' => 'list',
                    'object' => 'kantong'
                ])->with('msg_berhasil', 'sukses menghapus kantong');
                break;

            case 'edit-my-item':
                return $this->d_action_edit_item($request);
                break;

            case 'delete-my-item':
                $s = Souvenir::find($id);
                $k = $s->kantong;
                $k->total_ongkir = 0;
                $k->bukti_ongkir = null;
                $k->save();
                $s->delete();
                return redirect()->back()->with('msg_berhasil', 'sukses menghapus item');
                break;

            case 'submit-invoice':
                if ($request->hasFile('img')) {
                    $foto_url = join(
                        "_",
                        [
                            time(),
                            join('-', explode(' ', $request->nama)),
                            "invoice"
                        ]
                    )  . "." . $request->img->extension();
                    $request->img->storeAs('public', $foto_url);

                    $k = Kantong::with('souvenir')->where('kid', $request->query('kid'))->first();
                    $k->invoice_url = $foto_url;
                    $k->save();
                }
                return redirect()->back()->with('msg_berhasil', 'sukses submit invoice');
                break;

            case 'submit-ongkir':
                if ($request->hasFile('img')) {
                    $foto_url = join(
                        "_",
                        [
                            time(),
                            join('-', explode(' ', $request->nama)),
                            "bukti_ongkir"
                        ]
                    )  . "." . $request->img->extension();
                    $request->img->storeAs('public', $foto_url);

                    $k = Kantong::with('souvenir')->where('kid', $request->query('kid'))->first();
                    $k->bukti_ongkir = $foto_url;
                    $k->total_ongkir = $request->ongkir;
                    $k->save();
                }
                return redirect()->back()->with('msg_berhasil', 'sukes submit ongkir');
                break;
            default:
                return $this->d_action_redirect();
                break;
        }
        return 'd';
    }

    protected function d_action_redirect()
    {
        return redirect()->route('souvenir', [
            'mode' => 'list',
            'object' => 'katalog'
        ])->with('message', 'something wrong, please try again');
    }

    protected function d_action_add_kantong(Request $request)
    {
        $rules = [
            'nama' => 'required',
            'alamat' => 'required',
            'penerima' => 'required',
            'no' => 'required',
        ];

        Validator::make($request->all(), $rules, $this->msg)->validate();

        Kantong::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'penerima' => $request->penerima,
            'no' => $request->no,
            'invoice_url' => null, 'total_ongkir' => 0,
            'user_id' => Auth::user()->id,
            'kid' => Str::random(5) . '-' . join('-', explode(' ', $request->nama))
        ]);

        if (Session::has('redir')) {
            // dd(Session::get('redir'));
            $redir = Session::get('redir');
            Session::forget('redir');
            return redirect($redir);
        }

        return redirect()->route('souvenir', [
            'mode' => 'list',
            'object' => 'kantong'
        ])->with('msg_berhasil', 'sukses menambah keranjang');
    }

    protected function d_action_edit_kantong(Request $request)
    {
        $k = Kantong::where('kid', $request->kid)->first();

        $rules = [
            'nama' => 'required',
            'penerima' => 'required',
            'no' => 'required',
        ];

        if (!$k->invoice_url) {
            $rules['alamat'] = 'required';
        }

        Validator::make($request->all(), $rules, $this->msg)->validate();

        if ($k->nama != $request->nama) {
            $k->nama = $request->nama;
            $k->kid = Str::random(5) . '-' . join('-', explode(' ', $request->nama));
        }

        if ($k->alamat != $request->alamat && !$k->invoice_url) {
            $k->alamat = $request->alamat;
            $k->total_ongkir = 0;
            $k->bukti_ongkir = null;
        }

        if ($k->penerima != $request->penerima) {
            $k->penerima = $request->penerima;
        }

        if ($k->no != $request->no) {
            $k->no = $request->no;
        }

        $k->save();
        return redirect()->route('souvenir', [
            'mode' => 'detail',
            'object' => 'kantong',
            'kid' => $k->kid
        ])->with('msg_berhasil', 'sukses mengubah keranjang');
    }

    protected function d_action_add_souvenir(Request $request)
    {

        $rules = [
            "item_name" => "required",
            "item_id" => "required",
            "harga" => "required",
            "berat_gram" => "required",
            "kantong" => "required",
            "jumlah" => "required|integer",
            "catatan" => "required",
        ];

        Validator::make($request->all(), $rules, $this->msg)->validate();
        $k = Kantong::with('souvenir')->find($request->kantong);

        if (!$k) {
            return redirect()->back()->with([
                'msg_gagal' => 'keranjang tidak ditemukan'
            ]);
        }

        if ($k->souv_checker($request->item_id)) {
            return redirect()->back()->with([
                'msg_gagal' => 'item sudah ada di keranjang'
            ]);
        }

        $s = Souvenir::create([
            "json_id" => $request->item_id,
            "nama" => $request->item_name,
            "jumlah" => $request->jumlah,
            "harga" => $request->harga,
            "berat_gram" => $request->berat_gram,
            "kantong_id" => $request->kantong,
            "catatan" => $request->catatan,
            "total_harga" => $request->harga * $request->jumlah,
            "total_berat" => $request->berat_gram * $request->jumlah,
            "souv_id" => Str::random(5) . '-' . join('-', explode(' ', $request->item_name))
        ]);

        $k->bukti_ongkir = null;
        $k->total_ongkir = 0;
        $k->save();
        return redirect()->route('souvenir', [
            'mode' => 'detail',
            'object' => 'kantong',
            'kid' => $k->kid
        ])->with('msg_berhasil', 'sukses menambah item ke dalam keranjang');
    }

    protected function d_action_edit_item(Request $request)
    {
        $rules = [
            // "item_name" => "required",
            // "item_id" => "required",
            // "harga" => "required",
            // "berat_gram" => "required",
            "jumlah" => "required|integer",
            "catatan" => "required",
        ];


        Validator::make($request->all(), $rules, $this->msg)->validate();
        $k = Kantong::find($request->kantong);

        Souvenir::where('souv_id', $request->souv_id)->update([
            "jumlah" => $request->jumlah,
            "kantong_id" => $request->kantong,
            "catatan" => $request->catatan,
            "total_harga" => $request->harga * $request->jumlah,
            "total_berat" => $request->berat_gram * $request->jumlah,
        ]);

        $k->bukti_ongkir = null;
        $k->total_ongkir = 0;
        $k->save();

        return redirect()->route('souvenir', [
            'mode' => 'detail',
            'object' => 'kantong',
            'kid' => $k->kid,
        ])->with('msg_berhasil', 'sukses mengubah item pada keranjang');
    }
}
