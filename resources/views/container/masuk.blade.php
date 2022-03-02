@extends('template.general')

@section('title', 'MASUK')
@section('seo-desc')
@section('seo-img')

@section('addclass', 'masuk')

@section('content')
    <form action="{{ route('login') }}" method="post">
        @csrf
        <div class="masuk__top">
            <h2>Masuk</h2>
            <x-form.select-options id="univ" label="Universitas" options='{
                "1":"Universitas Airlangga",
                "2":"Universitas Brawijaya",
                "3":"Universitas Indonesia",
                "4":"Universitas Bojonegoro"
            }' class="" />
            <x-form.input-password-session-error id="password" label="Password" error="error" />
            <a href="{{ route('forgot-password') }}" class="masuk__lupa-password">Lupa Password Anda?</a>
        </div>

        <div class="masuk__bottom">
            <p class="masuk__to-registrasi">Anda belum memiliki akun? <a href="{{ route('register') }}">Registrasi</a></p>
            <button type="submit" class="btn-primary masuk__submit">MASUK</button>
        </div>
    </form>
@endsection

@section('other')
    @if (Session::has('auth.msg'))
        <x-alert.error title="{{ Session::get('auth.title') }}" desc="{{ Session::get('auth.msg') }}" />
    @endif

    {{-- ini yang gabisa --}}
    @if (Session::has('status'))
        @if (Session::get('status') == 'success')
            <x-alert.sukses title="Judul" desc="{{ Session::get('message') }}" />
        @endif
    @endif
@endsection
