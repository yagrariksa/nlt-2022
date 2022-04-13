@extends('template.admin')

@section('title', 'List Absensi Peserta')
@section('seo-desc')

@section('addclass', 'adm-full adm-absensi')

@section('content')
    <div class="adm-full__absolute">
        <div class="content adm-full__search-div">
            <input type="text" class="adm-dashboard__input-search" id="adm-absensi-search" placeholder="Search" style="">
        </div>
        <div class="adm-full__table-container">
            <table class="adm-table__table adm-table__table-head adm-absensi__table" id="tableAdmListAbsensi">
                <thead>
                    <tr>
                        <th><span>
                                No.
                            </span>
                        </th>
                        <th><span>
                                <span>Nama Peserta</span>
                            </span>
                        </th>
                        <th><span>
                                <span>Universitas</span>
                            </span>
                        </th>
                        @php
                            $ood = 1;
                            $sess = 1;
                        @endphp
                        @foreach ($jadwal as $joy)
                            <th><span>
                                    <span>Day {{ $ood }} - Sesi {{ $sess }}</span>
                                    <span class="malachite">{{ explode(' ', $joy[0])[1] }}-{{ explode(' ', $joy[1])[1] }}</span>
                                </span>
                            </th>
                            @php
                                if ($sess == 1) {
                                    $sess++;
                                } else {
                                    $ood++;
                                    $sess = 1;
                                }
                            @endphp
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ($peserta as $p)
                        <tr class="adm-table__record">
                            <td>{{ $loop->iteration }}</td>
                            <td class="adm-table__nama">{{ $p->nama }}</td>
                            <td class="adm-table__univ">{{ $p->univ->univ }}</td>

                            @foreach ($jadwal as $j)
                                <td>
                                    @switch($p->sudahAbsen($j[0], $j[1]))
                                        @case('sudah-absen')
                                            <a href="#" class="adm-absensi__tanda-absen adm-absensi__tanda-absen--sudah"
                                                onclick="window.open('{{ url('storage') . '/' . $p->absenImage($j[0], $j[1]) }}')">
                                                Sudah Absen</a>
                                        @break

                                        @case('absen-sekarang')
                                            <span class="adm-absensi__tanda-absen adm-absensi__tanda-absen--aktif">Sedang
                                                Aktif</span>
                                        @break

                                        @case('belum-saatnya-absen')
                                            <span class="adm-absensi__tanda-absen adm-absensi__tanda-absen--belum">Belum
                                                Dibuka</span>
                                        @break

                                        @case('tidak-absen')
                                            <span class="adm-absensi__tanda-absen adm-absensi__tanda-absen--tidak">Belum
                                                Absen</span>
                                        @break

                                        @default
                                    @endswitch
                                </td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="adm-full__footer">
            <div class="adm-footer__totals">
                <h5 class="adm-footer__total">
                    <span>NOTE</span>
                    : Klik pada kolom informasi absen untuk melihat bukti kehadiran
                </h5>
            </div>
            <div class="adm-full__btns">
                <button class="adm-dashboard__excel" {{-- link excel diganti ya --}}
                    onclick="window.open('{{ route('a.absensi.excel') }}')">
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
        $('.adm-absensi__tanda-absen--tidak').map(x => {
            $('.adm-absensi__tanda-absen--tidak')[x].parentElement.classList.add(
                'adm-absensi__tanda-absen--tidak-bg')
        })

        // search
        var data = document.querySelectorAll('.adm-table__record')

        document.querySelector('#adm-absensi-search').addEventListener('input', (e) => {
            var value = e.target.value

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
    </script>
@endsection
