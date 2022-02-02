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
    ]) }}" class="dashboard__menu dashboard__menu--souvenir">
        <h1>Souvenir <span></span></h1>
    </a>
    <a href="{{ route('peserta', [
        'mode' => 'list',
        'object' => 'travel',
    ]) }}"
        class="dashboard__menu dashboard__menu--travel-plan">
        <h1>Travel Plan <span></span></h1>
    </a>
@endsection

@section('other')
    {{-- it can be modal, etc. --}}
@endsection
