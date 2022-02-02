@extends('template.client')

@section('title', 'Peserta NLT AMSA')
@section('seo-desc', '...')
@section('seo-img', '')

@section('bodyclass', 'list-peserta__body')
@section('addclass', 'list-peserta')

@section('content')
    <div class="list-peserta__lg">
        <div class="list-peserta__top">
            <h1>List Peserta</h1>
            <a href="{{ route('peserta', [
                'mode' => 'add',
                'object' => 'peserta',
            ]) }}"
                class="button btn-primary">
                <img src="{{ url('assets/img/plus.svg') }}" alt="">
                TAMBAH PESERTA
            </a>
        </div>

        @if (Session::has('success'))
            <div class="list-peserta__success-delete">{{ Session::get('success') }}</div>
        @endif
        <div class="list-peserta__table-container">
            <table class="list-peserta__table" id="listPeserta">
                <colgroup>
                    <col span="1" style="width: 8%;">
                    <col span="1" style="width: 45%;">
                    <col span="1" style="width: 15%;">
                    <col span="1" style="width: 20%;">
                    <col span="1" style="width: 22%;">
                </colgroup>
                <thead>
                    <tr>
                        <th><span>
                                No.
                                <img src="{{ url('assets/img/sort.svg') }}" alt="" class="table-sort"
                                    onclick="sortTable('listPeserta', 0)">
                            </span>
                        </th>
                        <th><span>
                                Nama
                                <img src="{{ url('assets/img/sort.svg') }}" alt="" class="table-sort"
                                    onclick="sortTable('listPeserta', 1)">
                            </span>
                        </th>
                        <th><span>
                                Jabatan
                                <img src="{{ url('assets/img/sort.svg') }}" alt="" class="table-sort"
                                    onclick="sortTable('listPeserta', 2)">
                            </span>
                        </th>
                        <th><span>
                                Kelengkapan Dokumen
                                <img src="{{ url('assets/img/sort.svg') }}" alt="" class="table-sort"
                                    onclick="sortTable('listPeserta', 3)">
                            </span>
                        </th>
                        <th><span>
                                Aksi
                                <img src="{{ url('assets/img/sort.svg') }}" alt="" class="table-sort"
                                    onclick="sortTable('listPeserta', 4)">
                            </span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $p)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $p->nama }}</td>
                            <td>{{ $p->jabatan }}</td>
                            <td>{{ $p->kelengkapan }}</td>
                            <td class="list-peserta__aksi">
                                <a href="#" class="list-peserta__btn list-peserta__btn--view"><img
                                        src="{{ url('assets/img/view-details.svg') }}"></a>
                                <form class="no-space"
                                    action="{{ route('peserta', [
                                        'mode' => 'delete',
                                        'object' => 'peserta',
                                        'uid' => $p->uid,
                                    ]) }}"
                                    method="post">
                                    @method('delete')
                                    @csrf
                                    @if ($p->jabatan != 'ketua')
                                        <button type="submit" class="list-peserta__btn list-peserta__btn--delete"><img
                                                src="{{ url('assets/img/delete.svg') }}"></button>
                                    @else
                                        <button class="list-peserta__btn list-peserta__btn--delete" disabled><img
                                                src="{{ url('assets/img/delete.svg') }}"></button>
                                    @endif
                                </form>
                                <a href="{{ route('peserta', [
                                    'mode' => 'edit',
                                    'object' => 'peserta',
                                    'uid' => $p->uid,
                                ]) }}"
                                    class="list-peserta__btn list-peserta__btn--edit"><img
                                        src="{{ url('assets/img/edit.svg') }}"></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="list-peserta__sm">
        <h4>List Peserta</h4>
        <div class="list-peserta__cards">
            @foreach ($data as $p)
                <div class="list-peserta__card">
                    <h3 class="card__title">{{ $p->nama }}</h3>
                    <div class="card__value-label">
                        <h5 class="card__label card__label--notelp">No. Telepon</h5>
                        <h5 class="card__value card__value--notelp">{{ $p->handphone }}</h5>
                        <h5 class="card__label card__label--email">E-Mail</h5>
                        <h5 class="card__value card__value--email">a@a.com</h5>
                        <h5 class="card__label card__label--jabatan">Jabatan</h5>
                        <h5 class="card__value card__value--jabatan">{{ $p->jabatan }}</h5>
                        <h5 class="card__label card__label--alergi">Alergi</h5>
                        <h5 class="card__value card__value--alergi">{{ $p->alergi }}</h5>
                        <h5 class="card__label card__label--vegan">Vegetarian</h5>
                        <h5 class="card__value card__value--vegan">{{ $p->vegan }}</h5>
                    </div>
                    <div class="card__buttons">
                        <form class="no-space"
                            action="{{ route('peserta', [
                                'mode' => 'delete',
                                'object' => 'peserta',
                                'uid' => $p->uid,
                            ]) }}"
                            method="post">
                            @method('delete')
                            @csrf
                            @if ($p->jabatan != 'ketua')
                                <button type="submit" class="card__btn card__btn--delete"><img
                                        src="{{ url('assets/img/delete.svg') }}"> HAPUS</button>
                            @else
                                <button class="card__btn card__btn--delete" disabled><img
                                        src="{{ url('assets/img/delete.svg') }}"> HAPUS</button>
                            @endif
                        </form>
                        <a href="{{ route('peserta', [
                            'mode' => 'edit',
                            'object' => 'peserta',
                            'uid' => $p->uid,
                        ]) }}"
                            class="card__btn card__btn--edit"><img src="{{ url('assets/img/edit.svg') }}"> EDIT</a>
                        <a href="#" class="card__btn card__btn--view"><img
                                src="{{ url('assets/img/view-details.svg') }}">KTP
                            & PAS FOTO</a>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="list-peserta__sort-add">
            <div class="list-peserta__sort"></div>
            <a href="{{ route('peserta', [
                'mode' => 'add',
                'object' => 'peserta',
            ]) }}"
                class="list-peserta__add button btn-primary"><img src="{{ url('assets/img/plus.svg') }}" alt=""></a>
        </div>
    </div>
@endsection

@section('other')
    {{-- it can be modal, etc. --}}
@endsection
