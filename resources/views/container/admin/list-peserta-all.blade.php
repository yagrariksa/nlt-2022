@extends('template.admin')

@section('title', 'List Peserta')
@section('seo-desc')

@section('addclass', 'adm-dashboard')

@section('content')
    <div class="adm-dashboard__header">
        <h1 class="adm-dashboard__title">List Seluruh Peserta</h1>
        <div class="adm-dashboard__filter-div">
            <input type="text" class="adm-dashboard__input-search" id="filter-search" placeholder="Search" style="">
            <button class="btn-primary adm-dashboard__btn adm-dashboard__btn-filter">Urutkan Data</button>
            <div class="dialog">
                <h3 class="dialog__title">Urutkan Disini</h3>
                <div class="dialog__filter">
                    <div class="dialog__filter--quest-box">
                        <h4>Urutkan Berdasarkan</h4>
                        <select name="" id="select-column-sorter">
                            <option value="peserta-nama" selected>Nama Peserta</option>
                            <option value="peserta-univ">Asal Universitas</option>
                            <option value="peserta-jabatan">Jabatan</option>
                        </select>
                    </div>
                    <div class="dialog__filter--quest-box">
                        <h4>Urutkan Secara</h4>
                        <div class="dialog__filter--radio">
                            <input type="radio" name="sorter" id="radio-ascending" checked>
                            <label for="radio-ascending">A-Z</label>
                        </div>
                        <div class="dialog__filter--radio">
                            <input type="radio" name="sorter" id="radio-descending">
                            <label for="radio-descending">Z-A</label>
                        </div>
                    </div>
                </div>
                <div class="dialog__btn">
                    <span class="button dialog__btn-no adm-dashboard__dialog-filter--no">Reset</span>
                    <span class="button dialog__btn-yes adm-dashboard__dialog-filter--yes">Terapkan</span>
                </div>
            </div>
            <div class="dialog__bg"></div>
        </div>
    </div>
    <table class="adm-table__table-head">
        <colgroup>
            <col span="1" style="width: 8%;">
            <col span="1" style="width: 50%;">
            <col span="1" style="width: 25%;">
            <col span="1" style="width: 17%;">
        </colgroup>
        <thead>
            <tr>
                <th><span>
                        No.
                    </span>
                </th>
                <th><span>
                        <span>Nama</span>
                    </span>
                </th>
                <th><span>
                        <span>Asal Universitas</span>
                    </span>
                </th>
                <th><span>
                        <span>Jabatan</span>
                    </span>
                </th>
                {{-- <th></th> --}}
            </tr>
        </thead>
    </table>
    <div class="adm-table__table-container">
        <table class="adm-table__table list" id="tableAdmListPesertaAll">
            <colgroup>
                <col span="1" style="width: 8%;">
                <col span="1" style="width: 50%;">
                <col span="1" style="width: 25%;">
                <col span="1" style="width: 17%;">
            </colgroup>
            <tbody>
                @foreach ($data as $p)
                    <tr class="adm-table__record">
                        <td>{{ $loop->iteration }}</td>
                        <td class="adm-table__nama">{{ $p->nama }}</td>
                        <td class="adm-table__univ">{{ $p->univ->univ }}</td>
                        <td class="adm-table__jabatan">{{ $p->jabatan }}</td>
                        {{-- <td>
                            <a class="adm-table__btn"
                                href="{{ route('a.peserta', [
                                    'object' => 'peserta',
                                    'uid' => $p->uid,
                                ]) }}"><img
                                    src="{{ url('assets/img/view-details.svg') }}"> Detail</a>
                        </td> --}}
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="adm-footer">
        <div class="adm-footer__totals">
            <h5 class="adm-footer__total">Total Universitas: 38</h5>
            <hr>
            <h5 class="adm-footer__total">Total Peserta: 358</h5>
        </div>
        <div class="adm-footer__btns">
            <button class="adm-dashboard__excel" onclick="window.open('{{ route('a.peserta', ['object' => 'excel']) }}')">
                <img src="{{ url('assets/img/excel.svg') }}" alt="">
                DOWNLOAD EXCEL
            </button>
            <a href="{{ route('a.peserta', [
                'object' => 'peserta',
                'mode' => 'tampilan penuh',
            ]) }}"
                class="button btn-primary">
                <img src="{{ url('assets/img/fullscreen.svg') }}" alt="">
                TAMPILAN PENUH
            </a>
        </div>
    </div>
    <h4 class="adm-table--sm">Harap Akses melalui desktop.</h4>

@endsection

@section('other')
    {{-- it can be modal, etc. --}}
@endsection
