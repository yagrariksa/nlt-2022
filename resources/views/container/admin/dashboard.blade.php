@extends('template.admin')

@section('title', 'Hai, Admin!')
@section('seo-desc')

@section('addclass', 'adm-dashboard')

@section('content')
    <h1 class="adm-dashboard__title">List Universitas</h1>

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
                        <img src="{{ url('assets/img/sort.svg') }}" alt="" class="table-sort"
                            onclick="sortTable('tableAdmDashboard', 0)">
                    </span>
                </th>
                <th><span>
                        <span>Nama Universitas | <span class="color-champagne"> Total: 99</span></span>
                        <buton class="sort" data-sort="adm-table__nama">
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
                <th></th>
            </tr>
        </thead>
    </table>
    <div class="adm-table__table-container">
        <table class="adm-table__table list" id="tableAdmDashboard">
            <colgroup>
                <col span="1" style="width: 8%;">
                <col span="1" style="width: 50%;">
                <col span="1" style="width: 25%;">
                <col span="1" style="width: 17%;">
            </colgroup>
            <tbody>
                @php
                    $loopir = $data->perPage() * $data->currentPage() - ($data->perPage() - 1);
                @endphp
                @foreach ($data as $univ)
                    <tr>
                        <td>{{ $loopir }}</td>
                        @php
                            $loopir++;
                        @endphp
                        <td class="adm-table__univ">{{ $univ->univ }}</td>
                        <td class="adm-table__peserta">6746</td>
                        <td>
                            <a class="adm-table__btn"
                                href="{{ route('a.peserta', [
                                    'object' => 'peserta',
                                    'univ' => $univ->email,
                                ]) }}"><img
                                    src="{{ url('assets/img/view-details.svg') }}"> Detail</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- pagination --}}
    <span>current page : {{ $data->currentPage() }}</span>
    <span>showing {{ $data->perPage() * $data->currentPage() - ($data->perPage() - 1) }} to
        {{ $data->perPage() * $data->currentPage() }} of {{ $data->total() }} result</span>
    <span>Links
        <ul>
            @if ($data->currentPage() != 1)
                <li><a
                        href="{{ route('a.peserta', [
                            'object' => 'univ',
                            'page' => 1,
                        ]) }}">First
                        Page</a></li>
            @endif
            @for ($i = 2; $i < $data->currentPage(); $i++)
                <li><a
                        href="{{ route('a.peserta', [
                            'object' => 'univ',
                            'page' => $i,
                        ]) }}">
                        Page {{ $i }}</a></li>
            @endfor
            @for ($i = $data->currentPage() + 1; $i < $data->lastPage(); $i++)
                <li><a
                        href="{{ route('a.peserta', [
                            'object' => 'univ',
                            'page' => $i,
                        ]) }}">Page
                        {{ $i }}</a></li>
            @endfor
            @if ($data->currentPage() != $data->lastPage())
                <li><a
                        href="{{ route('a.peserta', [
                            'object' => 'univ',
                            'page' => $data->lastPage(),
                        ]) }}">Last
                        Page</a></li>
            @endif
            <li></li>
        </ul>
    </span>
    <span>paginator laravel page : <a
            href="https://laravel.com/docs/8.x/pagination#paginator-instance-methods">https://laravel.com/docs/8.x/pagination#paginator-instance-methods</a></span>
@endsection

@section('other')
    {{-- it can be modal, etc. --}}
@endsection
