<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
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
        // return view('be.d.setting');
        return view('container.ubah-pass');
    }

    public function view_forgot_password()
    {
        // return view('be.auth.forgot');
        return view('container.reset-pass');
    }

    public function action_regist(Request $request)
    {
        if (User::where('email', $request->univ)->first()) {
            // bring it to login with message
            return redirect()->route('login')->with([
                'auth.title' => 'Silakan Masuk!',
                'auth.msg' => 'ketua sudah melakukan pendaftaran, silakan masuk.',
                'univ' => $request->univ
            ]);
        }

        $rules = [
            'email' => 'required|email',
            'univ' => 'required',
            'nama' => 'required|string',
            'password' => 'required|min:8|confirmed',
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
        // buat ini hanya untuk 5 kali coba dalam 1 IP kemudian cooldown 10 menit
        if (!User::where('email', $request->univ)->first()) {
            return redirect()->route('register')->with([
                'univ' => $request->univ,
                'title' => 'Daftarkan Universitas Anda(?)',
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
        $rules = [
            'password_lama' => 'required',
            'password_baru' => 'required|min:8|confirmed'
        ];

        Validator::make($request->all(), $rules, $this->msg)->validate();

        if (Hash::check($request->password_lama, Auth::user()->password)) {
            $u = User::find(Auth::user()->id);
            $u->password =  Hash::make($request->password_baru);
            $u->save();
        } else {
            return redirect()->back()->with('password_lama', 'Password Lama Salah');
        }
        return redirect()->back()->with('success', 'Sukses ganti password');
    }

    public function action_forgot_password(Request $request)
    {
        $rules = [
            'univ' => 'required',
            'email' => 'required|email',
            'nama' => 'required'
        ];

        Validator::make($request->all(), $rules, $this->msg)->validate();

        $u = User::where('email', $request->univ)->first();
        $p = Peserta::where('email', $request->email)->first();
        // dump($u);
        // dd($p);
        if ($u && $p) {
            if ($p->user_id == $u->id && $p->nama == $request->nama) {
                $u->password = Hash::make('12345678');
                $u->save();
                return redirect()->route('login', [
                    'status' => 'success',
                    'message' => 'password anda sudah diubah ke 12345678'
                ]);
            }
        }

        return redirect()->back()->with([
            'status' => 'fail',
            'title' => 'Data Tidak Cocok!',
            'message' => 'data tidak cocok, password tidak di reset.'
        ]);
    }

    public function mahavira_view_login()
    {
        // return view('be.a.login');
        return view('container.admin.masuk');
    }

    public function mahavira_action_login(Request $request)
    {
        // buat ini hanya untuk 5 kali coba dalam 1 IP kemudian cooldown 10 menit
        $rules = [
            'pw' => 'required'
        ];

        Validator::make($request->all(), $rules, $this->msg)->validate();

        if ($request->pw == 'passwordtulisdisini') {
            Session::put('admin',true);
            return redirect()->route('a.peserta');
        }else{
            return redirect()->back()->with('error','Password Salah');
        }
    }

    public function mahavira_action_logout(Request $request)
    {
        Session::forget('admin');
        return redirect()->route('a.login');
    }
}
