@extends('template.admin')

@section('title', 'List Peserta Universitas - Tampilan Penuh')
@section('seo-desc')

@section('addclass', 'adm-full')

@section('content')
    <div class="adm-full__absolute">
        <div class="content adm-full__search-div">
            <input type="text" class="adm-dashboard__input-search" id="filter-search" placeholder="Search" style="">
        </div>
        <div class="adm-full__table-container">
            <table class="adm-table__table adm-table__table-head" id="tableAdmListPesertaAllFull">
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
                        <th><span>
                                <span>Nomor Telepon</span>
                            </span>
                        </th>
                        <th><span>
                                <span>Pas Foto</span>
                            </span>
                        </th>
                        <th><span>
                                <span>Email Peserta</span>
                            </span>
                        </th>
                        <th><span>
                                <span>ID Line</span>
                            </span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $p)
                        <tr class="adm-table__record">
                            <td>{{ $loop->iteration }}</td>
                            <td class="adm-table__nama">{{ $p->nama }}</td>
                            <td class="adm-table__univ">{{ $p->univ->univ }}</td>
                            <td class="adm-table__jabatan">{{ $p->jabatan }}</td>
                            <td class="adm-table__handphone">{{ $p->handphone }}</td>
                            <td class="adm-table__foto"><a href="{{ url('storage') . '/' . $p->foto_url }}"
                                    target="_blank" rel="noopener noreferrer">Lihat</a></td>
                            <td class="adm-table__email">{{ $p->email }}</td>
                            <td class="adm-table__line">{{ $p->line }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="adm-full__footer">
            <div class="adm-footer__totals">
                <h5 class="adm-footer__total">Total Universitas: {{ $jmlUniv }}</h5>
                <hr>
                <h5 class="adm-footer__total">Total Peserta: {{ $jmlPeserta }}</h5>
            </div>
            <div class="adm-full__btns">
                <button class="adm-dashboard__excel"
                    onclick="window.open('{{ route('a.peserta', ['object' => 'excel']) }}')">
                    <img src="{{ url('assets/img/excel.svg') }}" alt="">
                    DOWNLOAD EXCEL
                </button>
                <a href="{{ route('a.peserta', ['object' => 'peserta']) }}" class="button btn-primary">
                    <img src="{{ url('assets/img/minimize.svg') }}" alt="">
                    TAMPILAN RINGKAS
                </a>
            </div>
        </div>
    </div>
@endsection

@section('other')
    {{-- it can be modal, etc. --}}
@endsection
