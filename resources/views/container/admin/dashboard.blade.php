@extends('template.admin')

@section('title', 'Hai, Admin!')
@section('seo-desc')

@section('addclass', 'adm-dashboard')

@section('content')
    <h1 class="adm-dashboard__title">List Universitas</h1>

    <table class="adm-dashboard__table-head">
        <colgroup>
            <col span="1" style="width: 8%;">
            <col span="1" style="width: 55%;">
            <col span="1" style="width: 24%;">
            <col span="1" style="width: 13%;">
        </colgroup>
        <thead>
            <tr>
                <th><span>
                        No.
                        <img src="{{ url('assets/img/sort.svg') }}" alt="" class="table-sort"
                            onclick="sortTable('tableAdmDashboard', 0)">
                    </span>
                </th>
                <th><span>
                        <span>Nama Universitas | <span class="color-champagne"> Total: 99</span></span>
                        <buton class="sort" data-sort="adm-dashboard__nama">
                            <img src="{{ url('assets/img/sort.svg') }}" alt="" class="table-sort"
                                onclick="sortTable('tableAdmDashboard', 1)">
                        </buton>
                    </span>
                </th>
                <th><span>
                        <span>Jumlah Peserta | <span class="color-champagne"> Total: 1328</span></span>
                        <img src="{{ url('assets/img/sort.svg') }}" alt="" class="table-sort"
                            onclick="sortTable('tableAdmDashboard', 2)">
                    </span>
                </th>
            </tr>
        </thead>
    </table>
    <div class="adm-dashboard__table-container">
        <table class="adm-dashboard__table list" id="tableAdmDashboard">
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
                        <td class="adm-dashboard__nama">{{ $p->nama }}</td>
                        <td class="adm-dashboard__jabatan">{{ $p->jabatan }}</td>
                        <td class="adm-dashboard__aksi">
                            <a href="{{ route('peserta', [
                                'mode' => 'detail',
                                'object' => 'peserta',
                                'uid' => $p->uid,
                            ]) }}"
                                class="adm-dashboard__btn adm-dashboard__btn--view"><img
                                    src="{{ url('assets/img/view-details.svg') }}"></a>
                            @if ($p->jabatan != 'EB AMSA-Indonesia')
                                <button class="adm-dashboard__btn adm-dashboard__btn--delete"><img
                                        src="{{ url('assets/img/delete.svg') }}"></button>
                            @else
                                <button class="adm-dashboard__btn adm-dashboard__btn--delete" disabled><img
                                        src="{{ url('assets/img/delete.svg') }}"></button>
                            @endif
                            <form class="adm-dashboard__delete-dialog dialog"
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
                                    <span class="button dialog__btn-yes adm-dashboard__batal">Batal</span>
                                    <button type="submit" class="dialog__btn-no">Hapus</button>
                                </div>
                            </form>
                            <div class="dialog__bg"></div>
                            <a href="{{ route('peserta', [
                                'mode' => 'edit',
                                'object' => 'peserta',
                                'uid' => $p->uid,
                            ]) }}"
                                class="adm-dashboard__btn adm-dashboard__btn--edit"><img
                                    src="{{ url('assets/img/edit.svg') }}"></a>
                        </td>
                    </tr>

                    <tr>
                        <td>1</td>
                        <td>Universitas Indonesia</td>
                        <td>10</td>
                        <td><a href="#" class="adm-dashboard__btn"><img src="{{ url('assets/img/view-details.svg') }}">
                                Detail</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


    <div class="adm-dashboard__table-container">
        <table class="adm-dashboard__table" id="tableAdmDashboard">
            <colgroup>
                <col span="1" style="width: 8%;">
                <col span="1" style="width: 55%;">
                <col span="1" style="width: 24%;">
                <col span="1" style="width: 13%;">
            </colgroup>
            <thead>
                <tr>
                    <th><span>
                            No.
                            <img src="{{ url('assets/img/sort.svg') }}" alt="" class="table-sort"
                                onclick="sortTable('tableAdmDashboard', 0)">
                        </span>
                    </th>
                    <th><span>
                            <span>Nama Universitas | <span class="color-champagne"> Total: 99</span></span>
                            <img src="{{ url('assets/img/sort.svg') }}" alt="" class="table-sort"
                                onclick="sortTable('tableAdmDashboard', 1)">
                        </span>
                    </th>
                    <th><span>
                            <span>Jumlah Peserta | <span class="color-champagne"> Total: 1328</span></span>
                            <img src="{{ url('assets/img/sort.svg') }}" alt="" class="table-sort"
                                onclick="sortTable('tableAdmDashboard', 2)">
                        </span>
                    </th>
                    <th> </th>
                </tr>
            </thead>
            <tbody>
                @for ($i = 0; $i < 17; $i++)
                    {{-- @foreach ($data as $p) --}}
                    <tr>
                        <td>1</td>
                        <td>Universitas Indonesia</td>
                        <td>10</td>
                        <td><a href="#" class="adm-dashboard__btn"><img src="{{ url('assets/img/view-details.svg') }}">
                                Detail</a></td>
                    </tr>
                    {{-- @endforeach --}}
                @endfor
            </tbody>
        </table>
    </div>
@endsection

@section('other')
    {{-- it can be modal, etc. --}}
@endsection
