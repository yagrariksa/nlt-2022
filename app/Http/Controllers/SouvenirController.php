<?php

namespace App\Http\Controllers;

use App\Models\Kantong;
use App\Models\Souvenir;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class SouvenirController extends Controller
{
    public function d_view(Request $request)
    {
        $object = $request->query('object');
        $mode = $request->query('mode');
        $s_id = $request->query('s_id');
        $redir = $request->query('redirect');
        $kid = $request->query('kid');
        if ($redir == 'true') {
            Session::put('redir', explode(url('') . '/', url()->previous())[1]);
        }

        switch ($object) {
            case 'katalog':
                switch ($mode) {
                    case 'list':
                        return $this->d_view_list_souvenir();
                        break;

                    case 'detail':
                        return $this->d_view_detail_souvenir($s_id);
                        break;

                    case 'add':
                        return $this->d_view_add_souvenir($s_id);
                        break;

                    case 'edit':
                        return $this->d_view_edit_souvenir($s_id);
                        break;

                    default:
                        return $this->d_view_list_souvenir();
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
                return $this->d_view_list_souvenir();
                break;
        }
    }

    protected function d_view_list_souvenir()
    {
        return view('be.d.souvenir.list');
        // return view('container.list-souvenir');
    }

    protected function d_view_detail_souvenir($s_id)
    {
        // return view('be.d.souvenir.detail');
        return view('container.detail-souvenir');
    }

    protected function d_view_add_souvenir($s_id)
    {
        return view('be.d.souvenir.add');
    }

    protected function d_view_edit_souvenir($s_id)
    {
        $s = Souvenir::where('souv_id', $s_id)->first();
        return view('be.d.souvenir.edit', [
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
        return view('be.d.souvenir.kantong.add');
    }

    protected function d_view_edit_kantong($kid)
    {
        $k = Kantong::where('kid', $kid)->first();
        return view('be.d.souvenir.kantong.edit', [
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

        // return view('be.d.souvenir.kantong.detail', [
        return view('container.detail-keranjang', [
            'k' => $k
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
                return true;
                break;

            case 'edit-my-item':
                return $this->d_action_edit_item($request);
                break;

            case 'delete-my-item':
                Souvenir::find($id)->delete();
                return redirect()->back();
                break;

            case 'submit-invoice':
                return true;
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
            'alamat' => 'required'
        ];

        Validator::make($request->all(), $rules, $this->msg)->validate();

        Kantong::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
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
        ]);
    }

    protected function d_action_edit_kantong(Request $request)
    {
        $rules = [
            'nama' => 'required',
            'alamat' => 'required'
        ];

        Validator::make($request->all(), $rules, $this->msg)->validate();

        $k = Kantong::where('kid', $request->kid)->first();

        if ($k->nama != $request->nama) {
            $k->nama = $request->nama;
            $k->kid = Str::random(5) . '-' . join('-', explode(' ', $request->nama));
        }

        if ($k->alamat != $request->alamat) {
            $k->alamat = $request->alamat;
        }

        $k->save();
        return redirect()->route('souvenir', [
            'mode' => 'detail',
            'object' => 'kantong',
            'kid' => $k->kid
        ]);
    }

    protected function d_action_add_souvenir(Request $request)
    {

        $rules = [
            "item_name" => "required",
            "item_id" => "required",
            "harga" => "required",
            "berat_gram" => "required",
            "kantong" => "required",
            "jumlah" => "required",
            "catatan" => "required",
        ];

        Validator::make($request->all(), $rules, $this->msg)->validate();
        $k = Kantong::find($request->kantong);


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

        $k->save();
        return redirect()->route('souvenir', [
            'mode' => 'detail',
            'object' => 'kantong',
            'kid' => $k->kid
        ]);
    }

    protected function d_action_edit_item(Request $request)
    {
        $rules = [
            "item_name" => "required",
            "item_id" => "required",
            "harga" => "required",
            "berat_gram" => "required",
            "kantong" => "required",
            "jumlah" => "required",
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

        return redirect()->route('souvenir', [
            'mode' => 'detail',
            'object' => 'kantong',
            'kid' => $k->kid,
        ]);
    }
}
