@extends('template.client')

@section('title', 'Ubah Password')
@section('seo-desc')
@section('seo-img')

@section('addclass', 'ubah-pass')

@section('content')
    <form action="{{ route('akun.setting') }}" method="post">
        @csrf
        <div class="ubah-pass__top">
            <h2>Ubah Password</h2>
            <x-form.input-password-session-error id="password_lama" label="Password Lama" error="password_lama" />
            <x-form.input-password id="password_baru" label="Password Baru" />
            <x-form.input-password id="password_baru_confirmation" label="Konfirmasi Password Baru" />
        </div>

        <div class="ubah-pass__bottom">
            <p class="ubah-pass__to-home">Tidak ingin mengubah password? <a href="{{ route('home') }}">Kembali</a></p>
            <button type="submit" class="btn-primary ubah-pass__submit">UBAH</button>
        </div>
    </form>
@endsection

@section('other')
    {{-- it can be modal, etc. --}}
@endsection
