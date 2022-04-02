@extends('template.general')

@section('navbar')
    <x-navbar.admin />
@endsection

@section('admin-mobile')
    <div class="content adm-mobile">
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
    </div>
@endsection
