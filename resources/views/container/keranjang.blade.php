@extends('template.client')

@section('title', 'List Keranjang Alamat')
@section('seo-desc')
@section('seo-img')

@section('addclass', 'keranjang')

@section('content')
    <h4 class="mobile-title">List Keranjang Alamat</h4>
    <h1 class="keranjang__title">List Keranjang Alamat</h1>
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
                    <h3 class="keranjang__card--harga">Grand Total : <span>Rp{{ $k->souv_total()['total_harga'] }}</span>
                    </h3>
                    <img src="{{ url('assets/img/keranjang-arrow.svg') }}" alt="">
                </div>
            </div>
        @endforeach

    </div>
@endsection

@section('other')
    {{-- it can be modal, etc. --}}
@endsection
