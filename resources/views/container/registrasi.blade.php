@extends('template.general')

@section('title', 'REGISTRASI')
@section('seo-desc',
    'Segera daftarkan universitas anda untuk mengikuti NLT-AMSA 2022! (help aku gajago bikin kata-kata
    ginian dan ini keknya jelek bgt huehehe)',)

@section('overflow')
@section('addclass', 'registrasi')

@section('content')
    @if (Session::has('message'))
        <span class="error"
            style="position: absolute; top:5rem; left:0; right:0; background:red; text-align:center">{{ Session::get('message') }}</span>
    @endif

    <form action="{{ route('register') }}" method="post" enctype="multipart/form-data">
        @csrf
        <h2 class="registrasi__title">Registrasi</h2>
        <div class="registrasi__form-left">
            <x-form.input-text id="email" label="Email" />
            <x-form.input-text id="nama" label="Nama" />
            <x-form.input-text id="handphone" label="Nomor Telepon" />
        </div>
        <x-form.input-password id="password" label="Password" class=" registrasi__password" />
        <x-form.input-password id="confirm-password" label="Konfirmasi Password" class=" registrasi__confirm-password" />
        <x-form.input-text-with-help id="alergi" label="Alergi Makan Apa?*" helper="*Kosongi bila tidak ada"
            class=" registrasi__alergi" />
        <div class="registrasi__vegetarian form-radio @if ($errors->has('vegan')) has-error @endif">
            <h4>Vegetarian?</h4>
            <x-form.input-radio name="vegan" label="Iya" />
            <x-form.input-radio name="vegan" label="Tidak" />
            @if ($errors->has('vegan'))
                <h6 class="form-help" style="bottom: -1rem;"> {{ $errors->first('vegan') }}</h6>
            @endif
        </div>
        <div class="registrasi__form-right">
            <x-form.select-options id="univ" label="Universitas" opsi1="---Pilih Universitas---" options='{
                "1":"Universitas Airlangga",
                "2":"Universitas Brawijaya",
                "3":"Universitas Indonesia",
                "4":"Universitas Bojonegoro"
            }' />
            <x-form.select-options id="jabatan" label="Jabatan" opsi1="---Pilih Jabatan---" options='{
                "1":"Ketua AMSA Universitas",
                "2":"Anggota AMSA Universitas",
                "3":"Lainnya"
            }' />
            <x-form.input-img id="ktp" label="Foto KTP (JPG atau PNG)" />
            <x-form.input-img id="pas" label="Pas Foto (JPG atau PNG)" />
        </div>
        <p class="registrasi__to-masuk">Anda sudah memiliki akun? <a href="{{ route('login') }}">Masuk</a></p>
        <button type="submit" class="btn-primary registrasi__submit">REGISTRASI</button>
    </form>
@endsection

@section('other')
    {{-- it can be modal, etc. --}}
@endsection
