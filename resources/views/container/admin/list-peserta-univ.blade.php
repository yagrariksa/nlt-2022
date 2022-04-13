@extends('template.admin')

@section('title', 'List Peserta Universitas')
@section('seo-desc')

@section('addclass', 'adm-dashboard')

@section('content')
    <div class="adm-dashboard__header">
        <h1 class="adm-dashboard__title">List Peserta {{ $akronim }} <span>{{ $univ }}</span>
        </h1>
        <div class="adm-dashboard__filter-div">
            <a href="{{ route('a.peserta', ['object' => 'sertif', 'univ' => $email]) }}"
                class="button btn-primary sertif__upload-btn">
                UPLOAD SERTIFIKAT
            </a>
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
                        <span>Jabatan</span>
                    </span>
                </th>
                <th><span>
                        <span>ID Line</span>
                    </span>
                </th>
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
                @foreach ($data as $p)
                    <tr class="adm-table__record">
                        <td>{{ $loop->iteration }}</td>
                        <td class="adm-table__nama">{{ $p->nama }}</td>
                        <td class="adm-table__peserta">{{ $p->jabatan }}</td>
                        <td class="adm-table__peserta">{{ $p->line }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="adm-footer">
        <div class="adm-footer__totals">
            <h5 class="adm-footer__total">Total Peserta: 358</h5>
        </div>
        <div class="adm-footer__btns">
            <button class="adm-dashboard__excel"
                onclick="window.open('{{ route('a.peserta', ['object' => 'excel', 'univ' => $email]) }}')">
                <img src="{{ url('assets/img/excel.svg') }}" alt="">
                DOWNLOAD EXCEL
            </button>
            <a href="{{ route('a.peserta', [
                'object' => 'peserta',
                'univ' => $univ,
                'mode' => 'tampilan penuh',
            ]) }}"
                class="button btn-primary">
                <img src="{{ url('assets/img/fullscreen.svg') }}" alt="">
                TAMPILAN PENUH
            </a>
        </div>
    </div>

    {{-- SERTIF --}}
    @if ($sertif->count())
        <div class="sertif__container-gallery">
            @foreach ($sertif as $img)
                <div class="sertif__img-container">
                    <div class="sertif__img">
                        <img src="{{ url('storage') . '/' . $img->filename }}" alt="{{ $img->filename }}">
                        <a href="{{ url('storage') . '/' . $img->filename }}" alt="{{ $img->filename }}"
                            target="_blank" rel="noopener noreferrer" class="sertif__link">Click to view</a>
                        <span></span>
                    </div>
                    <button class="sertif__delete" data-id="{{ $img->id }}">DELETE</button>
                    <form class="sertif__delete-dialog dialog"
                        action="{{ route('a.peserta', ['mode' => 'delete-sertif']) }}" method="post">
                        @csrf
                        @method('delete')

                        <h3 class="dialog__title">Hapus Sertifikat?</h3>
                        <input type="hidden" value="{{ $img->id }}" name="image" class="img-id">
                        <h4 class="dialog__message">Apakah anda yakin ingin menghapus sertifikat ini?</h4>
                        <div class="dialog__btn">
                            <span class="button dialog__btn-yes list-peserta__batal">Batal</span>
                            <button type="submit" class="dialog__btn-no">Hapus</button>
                        </div>
                    </form>
                    <div class="dialog__bg"></div>
                </div>
            @endforeach

        </div>
    @else
        <div class="sertif__container-gallery sertif__container-gallery--none">
            <h2>Sertifikat Belum Diunggah</h2>
            <h4>Anda dapat mengunggah sertifikat <a class="h4"
                    href="{{ route('a.peserta', ['object' => 'sertif', 'univ' => $email]) }}">disini</a></h4>
        </div>
    @endif

@endsection

@section('other')
    @if (Session::has('msg_berhasil'))
        <x-alert.sukses title="Berhasil!" desc="{{ Session::get('msg_berhasil') }}" />
    @endif


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        const elementSpan = [];

        document.querySelectorAll(".sertif__img").forEach((elm, x) => {
            let addAnimation = false;
            if (!elementSpan[x])
                elementSpan[x] = elm.querySelector("span");

            elm.addEventListener("mouseover", e => {
                elementSpan[x].style.left = e.pageX - elm.offsetLeft + "px";
                elementSpan[x].style.top = e.pageY - elm.offsetTop + "px";
            });

            elm.addEventListener("mouseout", e => {
                elementSpan[x].style.left = e.pageX - elm.offsetLeft + "px";
                elementSpan[x].style.top = e.pageY - elm.offsetTop + "px";
            });
        });

        $('.sertif__delete').click(e => {
            
            $('.sertif__delete-dialog')[0].classList.add('active')
            $('.sertif__delete-dialog .img-id')[0].setAttribute('value', e.target.dataset.id)
            
        })
    </script>
@endsection
