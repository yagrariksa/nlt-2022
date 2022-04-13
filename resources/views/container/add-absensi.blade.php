@extends('template.client')

@section('title', 'Absensi')
@section('seo-desc')
@section('seo-img')

@section('addclass', 'add-absensi')

@section('content')
    @if ($absen)
        <h4 class="mobile-title">Absensi Peserta</h4>
        <form action="{{ route('absensi') }}" method="post" enctype="multipart/form-data">
            <div class="add-absensi__top">
                <div class="add-absensi__title-div">
                    <h1 class="add-absensi__title">Absensi Peserta</h1>
                    <h3 class="add-absensi__day-session">{{ $day }}</h3>
                </div>
                <div class="add-absensi__form">
                    @csrf
                    <input type="hidden" name="uid" value="{{ $user->uid }}">
                    <x-form.input-text id="nama" label="Nama (Terisi Otomatis)" value="{{ $user->nama }}"
                        attr="disabled" />
                    <x-form.input-text id="univ" label="Asal Universitas (Terisi Otomatis)"
                        value="{{ $user->univ->univ }}" attr="disabled" />
                    {{-- <x-form.input-img id="bukti" label="Bukti Kehadiran*" /> --}}
                    <div class="form-group @if ($errors->has('bukti')) has-error @endif">
                        <div class="form-group__input-file">
                            <span for="bukti" class="form-group__filename"></span>
                            <div class="button btn-primary">
                                <span class="lg">PILIH GAMBAR</span>
                                <span class="sm">@include('components.svg.img')</span>
                            </div>
                        </div>
                        <input type="file" accept="image/png, image/jpeg" name="bukti" id="bukti" value="" />
                        <label for="input" class="form-group__control-label">Bukti Kehadiran</label>
                        <i class="form-group__bar"></i>
                        @if ($errors->has('bukti'))
                            <h6 class="form-help">{{ $errors->first('bukti') }}</h6>
                            <h6 class="form-help" style="margin-top:1.2rem">
                                *Berupa screenshot yang menampilkan nama partisipan pada Zoom Meeting saat pelaksanaan
                                acara.
                            </h6>
                        @else
                            <h6 class="form-help">
                                *Berupa screenshot yang menampilkan nama partisipan pada Zoom Meeting saat pelaksanaan
                                acara.
                            </h6>
                        @endif
                    </div>

                </div>
            </div>
            <div class="add-absensi__bottom">
                <button type="submit" class="btn-primary">SUBMIT ABSEN</button>
                <a href="" class="add-absensi__batal">Batalkan</a>
            </div>
        </form>
    @else
        <div class="add-absensi__title-div">
            <h1 class="add-absensi__title">Absensi Peserta</h1>
            <h3 class="add-absensi__day-session">{{ $day }}</h3>
        </div>
        <div class="add-absensi__sorry">
            <h3>Maaf, absensi pada sesi ini telah ditutup.</h3>
            <a href="{{ route('absensi', ['mode' => 'list']) }}">Kembali ke list absensi</a>
        </div>
    @endif


    <div class="text-float" style="width: calc(100% - 4rem);
    max-width: 500px;
    position: fixed;
    right: 4rem;
    bottom: 3rem;
    z-index: 9;">
        <img src="{{ url('assets/img/floating-banner-bca.jpg') }}" alt="floating banner bca" class="floating-ads__img">
        <h4 class="floating-ads__close">&times; TUTUP IKLAN</h4>
    </div>
@endsection

@section('other')
    <div class="add-absensi__dialog dialog">
        <h3 class="dialog__title">Batalkan Absen?</h3>
        <h4 class="dialog__message">Apakah anda ingin membatalkan absensi?Informasi yang anda masukkan tidak akan tersimpan.
        </h4>
        <div class="dialog__btn">
            <span class="button btn-primary dialog__btn-yes list-peserta__batal">Tidak</span>
            <a href="{{ route('absensi', ['mode' => 'list']) }}" class="button dialog__btn-no">Ya, Batalkan</a>
        </div>
    </div>
    <div class="dialog__bg"></div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        $('.add-absensi__batal').click(e => {
            e.preventDefault();
            $('.add-absensi__dialog')[0].classList.add('active')
        })

        // CLOSE ADS
        $('.floating-ads__close').click(e => {
            e.target.parentElement.style.display = 'none';
        })
    </script>
@endsection
