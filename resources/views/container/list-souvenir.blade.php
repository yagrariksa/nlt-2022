@extends('template.client')

@section('title', 'Souvenir')
@section('seo-desc')
@section('seo-img')

@section('addclass', 'list-souvenir')

@php
$etalase = '';
for ($x = 0; $x < sizeof($kategori) - 1; $x++) {
    $etalase = $etalase . $kategori[$x]->nama . ',';
}
$etalase = $etalase . $kategori[sizeof($kategori) - 1]->nama;
@endphp

@section('content')
    <h4 class="mobile-title">Souvenir</h4>
    <div class="list-souvenir__title-div">
        <h1 class="list-souvenir__title">Souvenir</h1>
        <a href="{{ route('souvenir', [
            'mode' => 'list',
            'object' => 'kantong',
        ]) }}"
            class="button btn-primary">LIST KERANJANG <img src="{{ url('assets/img/white-arrow.svg') }}"></a>
    </div>
    <div class="list-souvenir__search-div">
        <input type="text" class="adm-dashboard__input-search" id="souvenir-search" placeholder="Cari barang" style="">
    </div>
    <x-form.select-option-new id="list-souvenir__etalase" label="Pilih Etalase" options='{{ $etalase }}'
        class="list-souvenir__etalase--sm" value="" />
    <div class="list-souvenir__content">
        <div class="list-souvenir__left">
            <h2 class="list-souvenir__etalase-title">Etalase</h2>
            <div class="list-souvenir__etalase">
                <h5 class="list-souvenir__etalase-btn active">Semua Barang</h5>
                @foreach ($kategori as $k)
                    <h5 class="list-souvenir__etalase-btn">{{ $k->nama }}</h5>
                @endforeach
            </div>
        </div>
        <div class="list-souvenir__right">
            @foreach ($kategori as $k)
                @if ($k->parent_id == null)
                    <div class="list-souvenir__kategori" id="{{ $k->nama }}">
                        <h2 class="kategori__title">{{ $k->nama }}</h2>
                        {{-- <b>{{ $k }}</b> --}}
                        <div class="list-souvenir__cards">
                            @foreach ($barang as $b)
                                @if ($k->kat_id == $b->kategori_id)
                                    {{-- <p>{{ $b }}</p> --}}
                                    <div class="list-souvenir__card"
                                        onclick="window.location.replace('{{ route('souvenir', ['mode' => 'detail', 'object' => 'katalog', 's_id' => $b->bar_id]) }}')">
                                        <img src="{{ url('assets/img/dashboard/souvenir.jpg') }}"
                                            alt="{{ $b->nama }}" class="list-souvenir__card--img">
                                        <div class="list-souvenir__card--white">
                                            <h4 class="list-souvenir__card--title">{{ $b->nama }}</h4>
                                            <p class="list-souvenir__card--harga">Rp{{ $b->harga }}</p>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
@endsection

@section('other')
    {{-- it can be modal, etc. --}}

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        $('.list-souvenir__etalase-btn').click(e => {
            $('.list-souvenir__etalase-btn').map(x => {
                $('.list-souvenir__etalase-btn')[x].classList.remove('active');
            })
            e.currentTarget.classList.add('active');

            for (let x = 0; x < $('.list-souvenir__right')[0].children.length; x++) {
                $('.list-souvenir__right')[0].children[x].style.display = 'none';
                if (e.currentTarget.innerHTML == 'Semua Barang') {
                    $('.list-souvenir__right')[0].children[x].style.display = 'flex';
                }
            }
            console.log($('.list-souvenir__right')[0].querySelector('#' + e.currentTarget.innerHTML));
            $('.list-souvenir__right')[0].querySelector('#' + e.currentTarget.innerHTML).style.display = 'flex';
        })
    </script>
@endsection
