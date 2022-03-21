@extends('template.client')

@section('title', 'Keranjang Alamat')
@section('seo-desc')
@section('seo-img')

@section('addclass', 'keranjang')

@section('content')
    <h1 class="keranjang__title">List Keranjang Alamat</h1>
    <div class="keranjang__cards">
        <div class="keranjang__card">
            <div class="keranjang__card--left">
                <h3 class="keranjang__card--title">Nama Keranjangnya</h3>
                <h4 class="keranjang__card--desc">Nama lengkap - nomor telpon</h4>
                <h4 class="keranjang__card--desc">alamaat lengkapnya</h4>
            </div>
            <div class="keranjang__card--right">
                <h3 class="keranjang__card--harga">Grand Total : <span>Rp372.000</span></h3>
                <img src="{{ url('assets/img/keranjang-arrow.svg') }}" alt="">
            </div>
        </div>
        <div class="keranjang__card">
            <div class="keranjang__card--left">
                <h3 class="keranjang__card--title">Nama Keranjangnya</h3>
                <h4 class="keranjang__card--desc">Nama lengkap - nomor telpon</h4>
                <h4 class="keranjang__card--desc">alamaat lengkapnya</h4>
            </div>
            <div class="keranjang__card--right">
                <h3 class="keranjang__card--harga">Grand Total : <span>Rp372.000</span></h3>
                <img src="{{ url('assets/img/keranjang-arrow.svg') }}" alt="" class="keranjang__card--arrow">
            </div>
        </div>
    </div>
@endsection

@section('other')
    {{-- it can be modal, etc. --}}
@endsection
