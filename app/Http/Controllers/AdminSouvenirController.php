<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\GambarBarang;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AdminSouvenirController extends Controller
{
    public function a_view(Request $request)
    {
        // dd($request);
        $mode = $request->query('mode');
        $object = $request->query('object');
        $key = $request->query('key');
        switch ($object) {
            case 'kategori':
                switch ($mode) {
                    case 'list':
                        return $this->kategori_list();
                        break;

                    case 'add':
                        return $this->kategori_add();
                        break;

                    case 'edit':
                        return $this->kategori_edit($key);
                        break;

                    default:
                        return $this->kategori_list();
                        break;
                }
                break;

            case 'barang':
                switch ($mode) {
                    case 'list':
                        return $this->barang_list();
                        break;

                    case 'add':
                        return $this->barang_add();
                        break;

                    case 'edit':
                        return $this->barang_edit($key);
                        break;

                    default:
                        return $this->barang_list();
                        break;
                }
                break;

            default:
                return view('be.a.souvenir');
                break;
        }
    }

    protected function kategori_list()
    {
        $data = Kategori::where('parent_id', null)->get();
        return view('be.a.kategori.list', [
            'data' => $data
        ]);
    }

    protected function kategori_add()
    {
        $k = Kategori::where('parent_id', null)->get();
        return view('be.a.kategori.add', [
            'k' => $k
        ]);
    }

    protected function kategori_edit($key)
    {
        $data = Kategori::where('kat_id', $key)->first();
        $k = Kategori::where('parent_id', null)->get();
        return view('be.a.kategori.edit', [
            'data' => $data,
            'k' => $k,
        ]);
    }

    protected function barang_list()
    {
        $k = Kategori::with('barang')->get();
        return view('be.a.barang.list', [
            'k' => $k
        ]);
    }

    protected function barang_add()
    {
        $k = Kategori::get();
        return view('be.a.barang.add', [
            'k' => $k
        ]);
    }

    protected function barang_edit($key)
    {
        $k = Kategori::get();
        $b = Barang::where('bar_id', $key)->first();
        return view('be.a.barang.edit', [
            'k' => $k,
            'b' => $b
        ]);
    }

    public function a_action(Request $request)
    {
        $mode = $request->query('mode');
        $key = $request->query('key');
        switch ($mode) {
            case 'add-new-kategori':
                Kategori::create([
                    'nama' => $request->nama,
                    'parent_id' => $request->parent,
                    'kat_id' => Str::random(10)
                ]);
                return redirect()->route('a.souvenir', ['mode' => 'list', 'object' => 'kategori']);
                break;

            case 'edit-my-kategori':
                $k = Kategori::where('kat_id', $key)->first();
                $k->nama = $request->nama;
                $k->parent_id = $request->parent;
                $k->save();
                return redirect()->route('a.souvenir', ['mode' => 'list', 'object' => 'kategori']);
                break;

            case 'add-new-barang':
                return $this->barang_new($request);
                break;

            case 'edit-my-barang':
                return $this->barang_edit_do($request, $key);
                break;

            case 'delete-my-gambar':
                GambarBarang::find($key)->delete();
                return redirect()->back();
                break;

            default:
                return true;
                break;
        }
    }

    protected function barang_new(Request $request)
    {
        $rules = [
            'nama' => 'required',
            'harga' => 'required',
            'berat' => 'required',
            'desc' => 'required',
            'kategori' => 'required',
            'img' => 'required|file|mimes:png,jpg,jpef|max:2048'
        ];

        Validator::make($request->all(), $rules, $this->msg)->validate();

        if ($request->hasFile('img')) {
            $foto_url = join(
                "_",
                [
                    time(),
                    join('-', explode(' ', $request->nama)),
                    "barang"
                ]
            )  . "." . $request->img->extension();
            $request->img->storeAs('public', $foto_url);
        }

        $b = Barang::create([
            'bar_id' => Str::random(5) . '-' . join('-', explode(' ', $request->nama)),
            'nama' => $request->nama,
            'harga' => $request->harga,
            'berat' => $request->berat,
            'desc' => $request->desc,
            'kategori_id' => $request->kategori
        ]);

        GambarBarang::create([
            'url' => $foto_url,
            'bid' => $b->id
        ]);

        return redirect()->route('a.souvenir', ['mode' => 'list', 'object' => 'barang']);
    }

    protected function barang_edit_do(Request $request, $key)
    {
        // dd($request->img);
        $rules = [
            'nama' => 'required',
            'harga' => 'required',
            'berat' => 'required',
            'desc' => 'required',
            'kategori' => 'required',
        ];

        Validator::make($request->all(), $rules, $this->msg)->validate();

        $b = Barang::where('bar_id', $key)->first();

        if ($request->hasFile('img')) {
            $foto_url = join(
                "_",
                [
                    time(),
                    join('-', explode(' ', $request->nama)),
                    "barang"
                ]
            )  . "." . $request->img->extension();
            $request->img->storeAs('public', $foto_url);

            GambarBarang::create([
                'url' => $foto_url,
                'bid' => $b->id
            ]);
        }

        $b->nama = $request->nama;
        $b->harga = $request->harga;
        $b->berat = $request->berat;
        $b->desc = $request->desc;
        $b->kategori_id = $request->kategori;
        $b->save();

        return redirect()->route('a.souvenir', ['mode' => 'list', 'object' => 'barang']);
    }
}
