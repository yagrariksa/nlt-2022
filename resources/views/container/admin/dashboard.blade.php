@extends('template.admin')

@section('title', 'Hai, Admin!')
@section('seo-desc')

@section('addclass', 'adm-dashboard')

@section('content')
    <h1 class="adm-dashboard__title">List Universitas</h1>
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
