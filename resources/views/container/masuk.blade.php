@extends('template.general')

@section('title', 'MASUK')
@section('seo-desc')
@section('seo-img')

@section('addclass', 'masuk')

@section('content')
    @if (Session::has('auth.msg'))
        <span class="error">{{ Session::get('auth.msg') }}</span>
    @endif

    <form action="{{ route('login') }}" method="post">
        @csrf
        <div class="masuk__top">
            <h2>Masuk</h2>
            <x-form.select-options id="univ" label="Universitas" options='{
                    "1":"Universitas Airlangga",
                    "2":"Universitas Brawijaya",
                    "3":"Universitas Indonesia",
                    "4":"Universitas Bojonegoro"
                }' />
            <x-form.input-password-session-error id="password" label="Password" error="error" />
            <a href="" class="masuk__lupa-password">Lupa Password Anda?</a>
        </div>

        <div class="masuk__bottom">
            <p class="masuk__to-registrasi">Anda belum memiliki akun? <a href="{{ route('register') }}">Registrasi</a></p>
            <button type="submit" class="btn-primary masuk__submit">MASUK</button>
        </div>
    </form>
@endsection

@section('other')
    {{-- it can be modal, etc. --}}
@endsection
