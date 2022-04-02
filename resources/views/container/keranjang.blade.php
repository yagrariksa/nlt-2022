@extends('template.client')

@section('title', 'List Keranjang')
@section('seo-desc')
@section('seo-img')

@section('addclass', 'keranjang')

@section('content')
    <h6 class="souvenir-breadcrumb">
        <a href="{{ route('souvenir', [
            'mode' => 'list',
            'object' => 'katalog',
        ]) }}"
            class="h6 souvenir-breadcrumb__item">Souvenir</a> /
        <a href="#" class="h6 souvenir-breadcrumb__item active">List Keranjang</a>
    </h6>
    <h4 class="mobile-title">List Keranjang</h4>
    <div class="keranjang__title-div">
        <h1 class="keranjang__title">List Keranjang</h1>
        <a class="button btn-primary"
            href="{{ route('souvenir', [
                'mode' => 'add',
                'object' => 'kantong',
                'redirect' => 'true',
            ]) }}">TAMBAH
            KERANJANG</a>
    </div>
    <div class="keranjang__cards">

        @foreach (Auth::user()->kantong as $k)
            <div class="keranjang__card"
                onclick="location.href = '{{ route('souvenir', [
                    'mode' => 'detail',
                    'object' => 'kantong',
                    'kid' => $k->kid,
                ]) }}'">
                <div class="keranjang__card--left">
                    <h3 class="keranjang__card--title">{{ $k->nama }}</h3>
                    <h4 class="keranjang__card--desc">Nama lengkap - nomor telpon</h4>
                    <h4 class="keranjang__card--desc">{{ $k->alamat }}</h4>
                </div>
                <hr>
                <div class="keranjang__card--right">
                    <h4 class="keranjang__card--harga">Grand Total : <span>Rp{{ $k->souv_total()['total_harga'] }}</span>
                    </h4>
                    <img src="{{ url('assets/img/keranjang-arrow.svg') }}" alt="">
                </div>
            </div>
        @endforeach

    </div>
@endsection

@section('other')
    {{-- it can be modal, etc. --}}
@endsection
