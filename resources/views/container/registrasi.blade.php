@extends('template.general')

@section('title', 'REGISTRASI')
@section('seo-desc',
    'Segera daftarkan universitas anda untuk mengikuti NLT-AMSA 2022! (help aku gajago bikin kata-kata
    ginian dan ini keknya jelek bgt huehehe)',)

@section('bodyclass', 'registrasi__body')
@section('addclass', 'registrasi')

@section('content')
    <form action="{{ route('register') }}" method="post" enctype="multipart/form-data">
        @csrf
        <h2 class="registrasi__title">Registrasi</h2>
        <div class="registrasi__form-left">
            <x-form.input-text id="email" label="Email" />
            <x-form.input-text id="nama" label="Nama" />
            <x-form.input-text id="handphone" label="Nomor Telepon" />
            <x-form.input-text id="line" label="ID Line" />
        </div>
        <x-form.input-password id="password" label="Password" class=" registrasi__password" />
        <x-form.input-password id="password_confirmation" label="Konfirmasi Password"
            class=" registrasi__confirm-password" />
        <div class="registrasi__form-right">
            <x-form.select-options id="univ" label="Universitas" options='{
                "1":"Universitas Airlangga",
                "2":"Universitas Brawijaya",
                "3":"Universitas Indonesia",
                "4":"Universitas Bojonegoro"
            }' class="" />
            <x-form.input-text id="jabatan" label="Jabatan" value="EB AMSA-Indonesia" attr="readonly" />
            {{-- <x-form.select-options id="jabatan" label="Jabatan" value="Ketua AMSA Universitas" options='{
                "1":"Ketua AMSA Universitas",
                "2":"Anggota AMSA Universitas",
                "3":"Lainnya"
            }' /> --}}
            <x-form.input-img id="ktp" label="Foto KTP (JPG atau PNG)" />
            <x-form.input-img id="pas" label="Pas Foto (JPG atau PNG)" />
        </div>
        <p class="registrasi__to-masuk">Anda sudah memiliki akun? <a href="{{ route('login') }}">Masuk</a></p>
        <button type="submit" class="btn-primary registrasi__submit">REGISTRASI</button>
    </form>
@endsection

@section('other')
    @if (Session::has('message'))
        <x-alert.error title="{{ Session::get('title') }}" desc="{{ Session::get('message') }}" />
    @endif
@endsection
