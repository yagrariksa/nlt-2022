@extends('template.client')

@section('title', 'REGISTRASI TELAH DITUTUP')
@section('seo-desc')
@section('seo-img')

@section('addclass', 'closereg')

@section('content')
    <div class="closereg__text">
        <h1 class="closereg__title">Sorry, registration is now closed.</h1>
        <h3 class="closereg__desc">You can’t register anymore, but if you already have an account, just <a
                class="h3" href="{{ route('login') }}">Login!</a></h3>
    </div>
@endsection

@section('other')
    {{-- it can be modal, etc. --}}
@endsection
