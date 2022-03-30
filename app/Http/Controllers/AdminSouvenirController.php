<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\GambarBarang;
use App\Models\Kantong;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use phpDocumentor\Reflection\DocBlock\Tags\Return_;

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
                        return $this->barang_list();
                        break;

                    case 'add':
                        return $this->kategori_add($key);
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

            case 'kantong':
                switch ($mode) {
                    case 'list':
                        return $this->kantong_list();
                        break;

                    case 'detail':
                        return $this->kantong_detail($key);
                        break;

                    default:
                        return $this->kantong_list();
                        break;
                }
                break;
            default:
                return $this->barang_list();
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

    protected function kategori_add($key)
    {
        if ($key == 'parent') {
            $k = null;
        } else {
            $k = Kategori::where('kat_id', $key)->first();
        }
        return view('be.a.kategori.add', [
            'k' => $k
        ]);
    }

    protected function kategori_edit($key)
    {
        $data = Kategori::where('kat_id', $key)->first();
        return view('be.a.kategori.edit', [
            'data' => $data,
        ]);
    }

    protected function barang_list()
    {
        $k = Kategori::with('barang')->where('parent_id', null)->get();
        // return view('be.a.barang.list', [
        return view('container.admin.souvenir', [
            'k' => $k
        ]);
    }

    protected function barang_add()
    {
        $k = Kategori::where('parent_id', null)->get();
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

    protected function kantong_list()
    {
        $b = Barang::get();
        $kantong = Kantong::get();
        return view('be.a.souvenir.list', [
            'kantong' => $kantong,
            'barang' => $b,
        ]);
    }

    protected function kantong_detail($key)
    {
        $kantong = Kantong::with('souvenir')->where('kid', $key)->first();
        return view('be.a.souvenir.detail', [
            'k' => $kantong
        ]);
    }

    public function a_action(Request $request)
    {
        $mode = $request->query('mode');
        $key = $request->query('key');
        switch ($mode) {
            case 'add-new-kategori':
                $rules = [
                    'nama' => 'required',
                ];

                Validator::make($request->all(), $rules, $this->msg)->validate();

                Kategori::create([
                    'nama' => $request->nama,
                    'parent_id' => $request->parent,
                    'kat_id' => Str::random(10)
                ]);
                return redirect()
                    ->route('a.souvenir', [
                        'mode' => 'list',
                        'object' => 'barang'
                    ])->with('msg', 'sukses menambahkan kategori');
                break;

            case 'edit-my-kategori':
                $rules = [
                    'nama' => 'required',
                ];

                Validator::make($request->all(), $rules, $this->msg)->validate();
                $k = Kategori::where('kat_id', $key)->first();
                $k->nama = $request->nama;
                $k->parent_id = $request->parent;
                $k->save();
                return redirect()
                    ->route('a.souvenir', [
                        'mode' => 'list', 'object' => 'barang'
                    ])->with('msg', 'sukses mengubah kategori');
                break;

            case 'delete-my-kategori':
                $k = Kategori::where('kat_id', $key)->first();
                foreach ($k->barang as $b) {
                    foreach ($b->gambar as $g) {
                        $g->delete();
                    }
                    $b->delete();
                }
                $k->delete();
                return redirect()
                    ->route('a.souvenir', [
                        'mode' => 'list', 'object' => 'barang'
                    ])->with('msg', 'sukses menghapus kategori');
                break;

            case 'add-new-barang':
                return $this->barang_new($request);
                break;

            case 'edit-my-barang':
                return $this->barang_edit_do($request, $key);
                break;

            case 'delete-my-barang':
                $b = Barang::where('bar_id', $key)->first();
                foreach ($b->gambar as $g) {
                    $g->delete();
                }
                $b->delete();
                return redirect()->back()->with('msg', 'sukses menghapus barang');
                break;

            case 'delete-my-gambar':
                GambarBarang::find($key)->delete();
                return redirect()->back()->with('msg', 'sukses menghapus gambar');
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
            'desc' => 'required|max:400',
            'kategori' => 'required',
        ];

        Validator::make($request->all(), $rules, $this->msg)->validate();

        $b = Barang::create([
            'bar_id' => Str::random(5) . '-' . join('-', explode(' ', $request->nama)),
            'nama' => $request->nama,
            'harga' => $request->harga,
            'berat' => $request->berat,
            'desc' => $request->desc,
            'kategori_id' => $request->kategori
        ]);

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

        return redirect()
            ->route('a.souvenir', [
                'mode' => 'list', 'object' => 'barang'
            ])->with('msg', 'sukses menambahkan barang');
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

        return redirect()
            ->route('a.souvenir', [
                'mode' => 'list',
                'object' => 'barang'
            ])->with('msg', 'sukses mengubah barang');
    }
}
