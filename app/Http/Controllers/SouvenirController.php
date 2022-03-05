<?php

namespace App\Http\Controllers;

use App\Models\Souvenir;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SouvenirController extends Controller
{
    public function d_view(Request $request)
    {
        $mode = $request->query('mode');
        $s_id = $request->query('s_id');

        switch ($mode) {
            case 'list':
                return $this->d_view_list_souvenir();
                break;

            case 'keranjang':
                return $this->d_view_list_keranjang();
                break;

            case 'add':
                return $this->d_view_add_souvenir($s_id);
                break;

            case 'edit':
                return $this->d_view_edit_keranjang($s_id);
                break;

            default:
                return  $this->d_view_list_souvenir();
                break;
        }
    }

protected function d_view_list_souvenir()
    {
        // return view('be.d.souvenir.list');
        return view('container.list-souvenir');
    }

    protected function d_view_add_souvenir($s_id)
    {
        return view('be.d.souvenir.add');
        return 'add souvenir ' . $s_id;
    }

    protected function d_view_list_keranjang()
    {
        return view('be.d.souvenir.keranjang');
    }

    public function d_action(Request $request)
    {
        $mode = $request->query('mode');
        switch ($mode) {
            case 'add':
                return $this->d_action_add_souvenir($request);
                break;

            case 'edit':
                # code...
                break;

            case 'delete':
                # code...
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
            'mode' => 'list'
        ])->with('message', 'something wrong, please try again');
    }

    protected function d_action_add_souvenir(Request $request)
    {
        // dd($request->all());

        $rules = [
            'peserta' => 'required',
            'jumlah' => 'required|integer',
        ];

        Validator::make($request->all(), $rules, $this->msg)->validate();

        Souvenir::create([
            'peserta_id' => $request->peserta,
            'item_name' => $request->item_name,
            'item_id' => $request->item_id,
            'item_count' => $request->jumlah,
            'catatan' => $request->catatan,
            'item_price' => $request->item_price
        ]);

        return redirect()->route('souvenir', [
            'mode' => 'keranjang',
        ]);
    }
}
