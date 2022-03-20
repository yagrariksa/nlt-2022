@extends('template.general')

@section('title', 'Selamat Datang Admin!')
@section('seo-desc')

@section('addclass', 'adm-login')

@section('content')
    <div class="adm-login__left">
        <h2>Admin</h2>
        <form action="{{ route('a.login') }}" method="post">
            @csrf
            <x-form.input-password id="pw" label="Password Admin" />
            <button type="submit" class="btn-primary">MASUK SEBAGAI ADMIN</button>
        </form>
    </div>
    <div class="adm-login__right">

    </div>
@endsection

@section('admin-mobile')
    <div class="adm-mobile__text">
        <h1 class="adm-mobile__title">Sorry:(</h1>
        <h2 class="adm-mobile__desc">Please use <span>laptop</span> or <span>desktop PC</span> to acces this admin page
            for
            ease of use. Thank You!</h2>
    </div>
    <div class="adm-mobile__images">
        <img src="{{ url('assets/img/logo-amsa.png') }}" alt="" class="adm-mobile__img">
        <img src="{{ url('assets/img/logo-nlt.png') }}" alt="" class="adm-mobile__img">
    </div>
@endsection

@section('other')
    {{-- it can be modal, etc. --}}
@endsection
