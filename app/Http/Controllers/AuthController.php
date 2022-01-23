<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function view_regist()
    {
        return view('be.auth.reg');
    }

    public function view_login()
    {
        return view('be.auth.login');
    }

    public function view_acc_setting()
    {
        return view('be.d.setting');
    }

    public function action_regist(Request $request)
    {
        if (User::where('email', $request->univ)->first()) {
            // bring it to login with message
            return redirect()->route('login')->with('auth.msg','ketua sudah melakukan pendaftaran, silahkan login');
        }

        $rules = [
            'univ' => 'required',
            'nama' => 'required|string',
            'password' => 'required|min:8',
            'handphone' => 'required|min:10',
            'ktp' => 'required|file|mimes:png,jpg,jpeg',
            'pas' => 'required|file|mimes:png,jpg,jpeg',
            'vegan' => 'required'
        ];

        $msg = [
            'required' => ':attribute wajib',
            'file' => 'harap upload file untuk :attribute',
            'min' => 'minimal :min karakter',
            'mimes' => 'file harus bertipe png, jpg, jpeg',
        ];

        Validator::make($request->all(), $rules, $messages = $msg)->validate();

        // please do validate in FrontEnd, 
        // idk how to handle files to keep in touch with input

        // check if it already registered
       

        if ($request->hasFile('pas')) {
            $foto_url = join("_", [time(), $request->nama, "foto", $request->pas->extension()]);
            $request->pas->storeAs('public', $foto_url);
        }

        if ($request->hasFile('ktp')) {
            $ktp_url = join("_", [time(), $request->nama, "ktp", $request->ktp->extension()]);
            $request->ktp->storeAs('public', $ktp_url);
        }

        $u = User::create([
            'email' => $request->univ,
            'ketua' => $request->nama,
            'password' => Hash::make($request->password)
        ]);

        Auth::login($u);

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

        dd(Auth::user());
    }

    public function action_login(Request $request)
    {
        return true;
    }

    public function action_acc_setting(Request $request)
    {
        return true;
    }
}
