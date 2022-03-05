@extends('template.general')

@section('title', 'Reset Password')
@section('seo-desc')
@section('seo-img')

@section('addclass', 'reset-pass')

@section('content')
    <form action="{{ route('forgot-password') }}" method="post">
        @csrf
        <div class="reset-pass__top">
            <h2>Reset Password</h2>
            <x-form.input-text id="univ" label="Universitas Email Spesial" />
            <x-form.input-text id="email" label="Email Ketua" />
            <x-form.input-text id="nama" label="Nama Ketua" />
        </div>

        <div class="reset-pass__bottom">
            <p class="reset-pass__to-login">Masih ingat password anda? <a href="{{ route('login') }}">Masuk</a></p>
            <button type="submit" class="btn-primary reset-pass__submit">RESET</button>
        </div>
    </form>
@endsection

@section('other')
    @if (Session::has('status'))
        @if (Session::get('status') == 'fail')
            <x-alert.error title="{{ Session::get('title') }}" desc="{{ Session::get('message') }}" />
        @endif
    @endif
@endsection
