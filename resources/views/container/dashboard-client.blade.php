@extends('template.client')

@section('title', 'DASHBOARD')
@section('seo-desc')
@section('seo-img')

@section('addclass', 'dashboard')

@section('content')
    <a href="{{ route('peserta', [
        'mode' => 'list',
        'object' => 'peserta',
    ]) }}"
        class="dashboard__menu dashboard__menu--list-peserta">
        <h1>List Peserta <span></span></h1>
    </a>
    <a href="{{ route('souvenir', [
        'mode' => 'list',
        'object' => 'katalog',
    ]) }}"
        class="dashboard__menu dashboard__menu--souvenir">
        <h1>Souvenir <span></span></h1>
    </a>
    <a href="{{ route('absensi', [
        'mode' => 'list',
    ]) }}" class="dashboard__menu dashboard__menu--absensi">
        <h1>Absensi <span></span></h1>
    </a>
@endsection

@section('other')
    {{-- it can be modal, etc. --}}
@endsection
