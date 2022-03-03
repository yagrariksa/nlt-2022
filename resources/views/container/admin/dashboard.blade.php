@extends('template.admin')

@section('title', 'Hai, Admin!')
@section('seo-desc')

@section('addclass', 'adm-dashboard')

@section('content')
    <h1 class="adm-dashboard__title">List Universitas</h1>
    <button class="adm-dashboard__btn adm-dashboard__btn-filter">Filter</button>
    <div class="dialog">
        <h3 class="dialog__title">Filter Disini</h3>
        <div class="dialog__filter">
            <div class="dialog__filter--quest-box">
                <h4>Urutkan Berdasarkan</h4>
                <select name="" id="">
                    <option value="#">Nama Universitas</option>
                    <option value="#">Jumlah Peserta</option>
                </select>
            </div>
            <div class="dialog__filter--quest-box">
                <h4>Urutkan Secara</h4>
                <div class="dialog__filter--radio">
                    <input type="radio" name="sorter" id="ascending">
                    <label for="ascending">A-Z</label>
                </div>
                <div class="dialog__filter--radio">
                    <input type="radio" name="sorter" id="descending">
                    <label for="descending">Z-A</label>
                </div>
            </div>
        </div>

        <div class="dialog__btn">
            <span class="button dialog__btn-no adm-dashboard__dialog-filter--no">Reset</span>
            <span class="button dialog__btn-yes adm-dashboard__dialog-filter--yes">Terapkan</span>
        </div>
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
                @for ($i = 1; $i < 17; $i++)
                    {{-- @foreach ($data as $p) --}}
                    <tr>
                        <td>{{ $i }}</td>
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
