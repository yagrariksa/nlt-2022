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

@section('other')
    {{-- it can be modal, etc. --}}
@endsection
