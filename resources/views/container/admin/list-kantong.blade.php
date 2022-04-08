@extends('template.admin')

@section('title', 'Keranjang Peserta')
@section('seo-desc')

@section('addclass', 'adm-full adm-keranjang')

@php
$totalTerbeli = 0;
@endphp

@section('content')
    <div class="adm-full__absolute adm-keranjang__list-alamat active">
        <div class="content adm-full__search-div">
            <input type="text" class="adm-dashboard__input-search" id="filter-search--list-terjual"
                placeholder="Cari berdasarkan Barang atau jumlah terjual" style="">
            <div class="adm-keranjang__toggle">
                <button class="h5 adm-keranjang__toggle-btn adm-keranjang__toggle-btn--list-alamat active">
                    Tabel List Alamat
                </button>
                <button class="h5 adm-keranjang__toggle-btn adm-keranjang__toggle-btn--list-terjual">
                    Tabel List Barang Terjual
                </button>
            </div>
        </div>
        <div class="adm-full__table-container">
            <table class="adm-table__table adm-table__table-head" id="tableAdminAlamat">
                <thead>
                    <tr>
                        <th><span>
                                No.
                            </span>
                        </th>
                        <th><span>
                                <span>Nama Keranjang</span>
                            </span>
                        </th>
                        <th><span>
                                <span>Nama Penerima</span>
                            </span>
                        </th>
                        <th><span>
                                <span>Nomor Penerima</span>
                            </span>
                        </th>
                        <th><span>
                                <span>Universitas</span>
                            </span>
                        </th>
                        <th><span>
                                <span>Alamat</span>
                            </span>
                        </th>
                        <th><span>
                                <span>Jumlah Barang</span>
                            </span>
                        </th>
                        <th><span>
                                <span>Total Harga</span>
                            </span>
                        </th>
                        <th><span>
                                <span>Bukti Pembayaran</span>
                            </span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kantong as $k)
                        <tr class="adm-table__record adm-table__record-keranjang">
                            <td>{{ $loop->iteration }}</td>
                            <td class="adm-table__nama-keranjang"><a
                                    href="{{ route('a.souvenir', [
                                        'mode' => 'detail',
                                        'object' => 'kantong',
                                        'key' => $k->kid,
                                    ]) }}">{{ $k->nama }}</a>
                            </td>
                            <td class="adm-table__nama-penerima">{{ $k->penerima }}</td>
                            <td class="adm-table__nomor-penerima">{{ $k->no }}</td>
                            <td class="adm-table__univ">{{ $k->univ->akronim }}</td>
                            <td class="adm-table__alamat">{{ $k->alamat }}</td>
                            <td class="adm-table__jumlah-barang">{{ $k->souv_total()['jumlah_item'] }}</td>
                            <td class="adm-table__total-harga">{{ $k->souv_total()['total_harga'] }}</td>
                            <td class="adm-table__pembayaran">
                                @if ($k->invoice_url)
                                    <span class="terupload">Terupload</span>
                                    <a href="{{ url('storage') . '/' . $k->invoice_url }}" target="_blank" rel="noopener noreferrer">Lihat</a>
                                @else
                                    <span class="belum-upload">Belum Diupload</span>
                                @endif
                            </td>
                        </tr>
                        {{-- @php
                            // dunno kalo udah ada datanya di db, mungkin bisa diganti:"
                            $totalTerbeli += $b->terbeli_count();
                        @endphp --}}
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="adm-full__footer">
            <div class="adm-footer__totals">
                <h5 class="adm-footer__total">Total Alamat: {{ sizeof($barang) }}</h5>
                <hr>
                <h5 class="adm-footer__total">Jumlah Barang Terbeli: {{ $totalTerbeli }}</h5>
            </div>
            <div class="adm-full__btns">
                <button class="adm-dashboard__excel" {{-- LINK EXCELNYA DIGANTI NANTI --}}
                    onclick="window.open('{{ route('a.souvenir', ['object' => 'kantong', 'mode' => 'excel']) }}')">
                    <img src="{{ url('assets/img/excel.svg') }}" alt="">
                    DOWNLOAD EXCEL
                </button>
            </div>
        </div>
    </div>

    <div class="adm-full__absolute adm-keranjang__list-terjual">
        <div class="content adm-full__search-div">
            <input type="text" class="adm-dashboard__input-search" id="filter-search--list-barang"
                placeholder="Cari berdasarkan Barang atau jumlah terjual" style="">
            <div class="adm-keranjang__toggle">
                <button class="h5 adm-keranjang__toggle-btn adm-keranjang__toggle-btn--list-alamat">
                    Tabel List Alamat
                </button>
                <button class="h5 adm-keranjang__toggle-btn adm-keranjang__toggle-btn--list-terjual active">
                    Tabel List Barang Terjual
                </button>
            </div>
        </div>
        <div class="adm-full__table-container">
            {{-- Tabel baarng terjual --}}
            <table class="adm-table__table adm-table__table-head" id="tableAdminBarangTerjual">
                <colgroup>
                    <col span="1" style="width: 8%;">
                    <col span="1" style="width: 75%;">
                    <col span="1" style="width: 17%;">
                </colgroup>
                <thead>
                    <tr>
                        <th><span>
                                No.
                            </span>
                        </th>
                        <th><span>
                                <span>Barang</span>
                            </span>
                        </th>
                        <th><span>
                                <span>Jumlah Terjual</span>
                            </span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($barang as $b)
                        <tr class="adm-table__record adm-table__record-barang">
                            <td>{{ $loop->iteration }}</td>
                            <td class="adm-table__nama">{{ $b->nama }}</td>
                            <td class="adm-table__terbeli">{{ $b->terbeli_count() }}</td>
                        </tr>

                        @php
                            // dunno kalo udah ada datanya di db, mungkin bisa diganti:"
                            $totalTerbeli += $b->terbeli_count();
                        @endphp
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="adm-full__footer">
            <div class="adm-footer__totals">
                <h5 class="adm-footer__total">Total Barang: {{ sizeof($barang) }}</h5>
                <hr>
                <h5 class="adm-footer__total">Jumlah Barang Terbeli: {{ $totalTerbeli }}</h5>
            </div>
            <div class="adm-full__btns">
                <button class="adm-dashboard__excel"
                    onclick="window.open('{{ route('a.souvenir', ['object' => 'barang', 'mode' => 'excel']) }}')">
                    <img src="{{ url('assets/img/excel.svg') }}" alt="">
                    DOWNLOAD EXCEL
                </button>
            </div>
        </div>
    </div>
@endsection

@section('other')
    {{-- it can be modal, etc. --}}

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        $('.adm-keranjang__toggle-btn--list-terjual').click(() => {
            $('.adm-keranjang__list-alamat')[0].classList.remove('active')
            $('.adm-keranjang__list-terjual')[0].classList.add('active')
        })
        $('.adm-keranjang__toggle-btn--list-alamat').click(() => {
            $('.adm-keranjang__list-alamat')[0].classList.add('active')
            $('.adm-keranjang__list-terjual')[0].classList.remove('active')
        })

        // search per keranjang alamat
        var data = document.querySelectorAll('.adm-table__record-keranjang')

        document.querySelector('#filter-search--list-terjual').addEventListener('input', (e) => {
            var value = e.target.value
            console.log(value)

            data.forEach(e => {
                e.style.display = 'none'
            });

            if (value == null) {
                data.forEach(e => {
                    e.style.display = 'table-row'
                })
            } else {
                data.forEach(e => {
                    if (e.innerText.toLowerCase().includes(value.toLowerCase())) {
                        e.style.display = 'table-row'
                    }
                })
            }
        })

        // search per barang
        var data2 = document.querySelectorAll('.adm-table__record-barang')

        document.querySelector('#filter-search--list-barang').addEventListener('input', (e) => {
            var value = e.target.value
            console.log(value)

            data2.forEach(e => {
                e.style.display = 'none'
            });

            if (value == null) {
                data2.forEach(e => {
                    e.style.display = 'table-row'
                })
            } else {
                data2.forEach(e => {
                    if (e.innerText.toLowerCase().includes(value.toLowerCase())) {
                        e.style.display = 'table-row'
                    }
                })
            }
        })
    </script>
@endsection
