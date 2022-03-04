@extends('template.client')

@section('title', 'Peserta NLT AMSA')
@section('seo-desc', '...')
@section('seo-img', '')

@section('bodyclass', 'list-peserta__body')
@section('addclass', 'list-peserta')

@section('content')
    <div class="list-peserta__lg" id="d-list-peserta">
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

        <table class="list-peserta__table-head">
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
                            <img src="{{ url('assets/img/sort.svg') }}" alt="" class="table-sort"
                                onclick="sortTable('listPeserta', 0)">
                        </span>
                    </th>
                    <th><span>
                            Nama
                            <buton class="sort" data-sort="list-peserta__nama">
                                <img src="{{ url('assets/img/sort.svg') }}" alt="" class="table-sort">
                                {{-- onclick="sortTable('listPeserta', 1)"> --}}
                            </buton>
                        </span>
                    </th>
                    <th><span>
                            Jabatan
                            <img src="{{ url('assets/img/sort.svg') }}" alt="" class="table-sort"
                                onclick="sortTable('listPeserta', 2)">
                        </span>
                    </th>
                    <th><span>
                            Aksi
                        </span>
                    </th>
                </tr>
            </thead>
        </table>
        <div class="list-peserta__table-container">
            <table class="list-peserta__table list" id="listPeserta">
                <colgroup>
                    <col span="1" style="width: 8%;">
                    <col span="1" style="width: 50%;">
                    <col span="1" style="width: 25%;">
                    <col span="1" style="width: 17%;">
                </colgroup>
                <tbody>
                    @foreach ($data as $p)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td class="list-peserta__nama">{{ $p->nama }}</td>
                            <td class="list-peserta__jabatan">{{ $p->jabatan }}</td>
                            <td class="list-peserta__aksi">
                                <a href="{{ route('peserta', [
                                    'mode' => 'detail',
                                    'object' => 'peserta',
                                    'uid' => $p->uid,
                                ]) }}"
                                    class="list-peserta__btn list-peserta__btn--view"><img
                                        src="{{ url('assets/img/view-details.svg') }}"></a>
                                @if ($p->jabatan != 'Representative AMSA Universitas')
                                    <button class="list-peserta__btn list-peserta__btn--delete"><img
                                            src="{{ url('assets/img/delete.svg') }}"></button>
                                @else
                                    <button class="list-peserta__btn list-peserta__btn--delete" disabled><img
                                            src="{{ url('assets/img/delete.svg') }}"></button>
                                @endif
                                <form class="list-peserta__delete-dialog dialog"
                                    action="{{ route('peserta', [
                                        'mode' => 'delete',
                                        'object' => 'peserta',
                                        'uid' => $p->uid,
                                    ]) }}"
                                    method="post">
                                    @method('delete')
                                    @csrf

                                    <h3 class="dialog__title">Hapus Peserta?</h3>
                                    <h4 class="dialog__message">Apakah anda yakin ingin menghapus peserta
                                        {{ $p->nama }}?</h4>
                                    <div class="dialog__btn">
                                        <span class="button dialog__btn-yes list-peserta__batal">Batal</span>
                                        <button type="submit" class="dialog__btn-no">Hapus</button>
                                    </div>
                                </form>
                                <div class="dialog__bg"></div>
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
                        <h5 class="card__label card__label--jabatan">Jabatan</h5>
                        <h5 class="card__value card__value--jabatan">{{ $p->jabatan }}</h5>
                        <h5 class="card__label card__label--email">E-Mail</h5>
                        <h5 class="card__value card__value--email">a@a.com</h5>
                        <h5 class="card__label card__label--notelp">No. Telepon</h5>
                        <h5 class="card__value card__value--notelp">{{ $p->handphone }}</h5>
                        <h5 class="card__label card__label--line">ID Line</h5>
                        <h5 class="card__value card__value--line">{{ $p->line }}</h5>
                    </div>
                    <div class="card__buttons">
                        <a href="{{ route('peserta', [
                            'mode' => 'detail',
                            'object' => 'peserta',
                            'uid' => $p->uid,
                        ]) }}"
                            class="card__btn card__btn--view"><img src="{{ url('assets/img/view-details.svg') }}"> LIHAT
                            PAS FOTO</a>
                        @if ($p->jabatan != 'Representative AMSA Universitas')
                            <button class="card__btn card__btn--delete"><img src="{{ url('assets/img/delete.svg') }}">
                                HAPUS</button>
                        @else
                            <button class="card__btn card__btn--delete" disabled><img
                                    src="{{ url('assets/img/delete.svg') }}"> HAPUS</button>
                        @endif
                        <form class="list-peserta__delete-dialog dialog"
                            action="{{ route('peserta', [
                                'mode' => 'delete',
                                'object' => 'peserta',
                                'uid' => $p->uid,
                            ]) }}"
                            method="post">
                            @method('delete')
                            @csrf

                            <h3 class="dialog__title">Hapus Peserta?</h3>
                            <h4 class="dialog__message">Apakah anda yakin ingin menghapus peserta
                                {{ $p->nama }}?</h4>
                            <div class="dialog__btn">
                                <span class="button dialog__btn-yes list-peserta__batal">Batal</span>
                                <button type="submit" class="dialog__btn-no">Hapus</button>
                            </div>
                        </form>
                        <div class="dialog__bg"></div>

                        <a href="{{ route('peserta', [
                            'mode' => 'edit',
                            'object' => 'peserta',
                            'uid' => $p->uid,
                        ]) }}"
                            class="card__btn card__btn--edit"><img src="{{ url('assets/img/edit.svg') }}"> EDIT</a>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="list-peserta__sort-add">
            <div class="list-peserta__sort">
                <h4>A - Z</h4>
                <img src="{{ url('assets/img/sort.svg') }}" alt="" class="">
            </div>
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
    @if (Session::has('success'))
        <x-alert.sukses title="{{ Session::get('success-title') }}" desc="{{ Session::get('success') }}" />
    @endif

    @if (Session::has('error'))
        <x-alert.error title="{{ Session::get('error-title') }}" desc="{{ Session::get('error') }}" />
    @endif
@endsection
