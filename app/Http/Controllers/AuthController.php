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
        // return view('be.auth.reg');
        return view('container.registrasi');
    }

    public function view_login()
    {
        // return view('be.auth.login');
        return view('container.masuk');
    }

    public function view_acc_setting()
    {
        return view('be.d.setting');
    }

    public function action_regist(Request $request)
    {
        if (User::where('email', $request->univ)->first()) {
            // bring it to login with message
            return redirect()->route('login')->with([
                'auth.msg' => 'ketua sudah melakukan pendaftaran, silahkan login',
                'univ' => $request->univ
            ]);
        }

        $rules = [
            'univ' => 'required',
            'nama' => 'required|string',
            'password' => 'required|min:8',
            // 'confirm-password' => 'required|same',
            'handphone' => 'required|min:10',
            'ktp' => 'required|file|mimes:png,jpg,jpeg',
            'pas' => 'required|file|mimes:png,jpg,jpeg',
            'vegan' => 'required'
        ];

        Validator::make($request->all(), $rules, $messages = $this->msg)->validate();

        // please do validate in FrontEnd, 
        // idk how to handle files to keep in touch with input

        if ($request->hasFile('pas')) {
            $foto_url = join("_", [time(), $request->nama, "foto"]) . "." . $request->pas->extension();
            $request->pas->storeAs('public', $foto_url);
        }

        if ($request->hasFile('ktp')) {
            $ktp_url = join("_", [time(), $request->nama, "ktp"])  . "." . $request->pas->extension();
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
            'vegan' => $request->vegan == 'Iya' ? true : false,
            'uid' => join('-', [
                Str::random(10),
                join('-', explode(" ", $request->nama))
            ])
        ]);

        return('dah masok niy');
    }

    public function action_login(Request $request)
    {
        if (!User::where('email', $request->univ)->first()) {
            return redirect()->route('register')->with([
                'univ' => $request->univ,
                'message' => 'ketua belum melakukan pendaftaran, harap ketua bla bla bla'
            ]);
        }

        if (Auth::attempt([
            'email' => $request->univ,
            'password' => $request->password
        ])) {
            return redirect()->route('home');
        }

        return redirect()->back()->with('error', 'password salah');
    }

    public function action_acc_setting(Request $request)
    {
        return true;
    }
}
