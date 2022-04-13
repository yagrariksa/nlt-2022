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
            <x-form.input-text id="email" label="Universitas Email Spesial"
                value="{{ Session::has('email') ? Session::get('email') : '' }}" />
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
    @if (Session::has('status'))
        @if (Session::get('status') == 'success')
            <x-alert.sukses title="{{ Session::get('title') }}" desc="{{ Session::get('message') }}" />
        @endif
    @endif
    @if (Session::has('success.regis'))
        <x-alert.sukses title="{{ Session::get('title') }}" desc="{{ Session::get('success.regis') }}"
            another="{{ Session::get('email') }}" />
    @endif
    <div class="text-float" style="width: calc(100% - 4rem);
    max-width: 500px;
    position: fixed;
    right: 4rem;
    bottom: 3rem;
    z-index: 9;">
        <img src="{{ url('assets/img/floating-banner-bca.jpg') }}" alt="floating banner bca" class="floating-ads__img">
        <h4 class="floating-ads__close">&times; TUTUP IKLAN</h4>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        $('.floating-ads__close').click(e => {
            e.target.parentElement.style.display = 'none';
        })
    </script>
@endsection
