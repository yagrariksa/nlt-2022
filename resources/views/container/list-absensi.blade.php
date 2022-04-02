@extends('template.client')

@section('title', 'Absensi')
@section('seo-desc')
@section('seo-img')

@section('addclass', 'absensi')

@php
$namas = '';
foreach (Auth::user()->peserta as $peserta) {
    $namas = $namas . ',' . $peserta->nama;
}

$namas = substr($namas, 1);
@endphp

@section('content')
    <h4 class="mobile-title">Absensi Peserta</h4>
    <div class="absensi__top">
        <h1 class="absensi__title">Absensi Peserta</h1>
        <x-form.select-option-new id="absensi__peserta" label="Pilih Peserta" options='{{ $namas }}'
            class="absensi__pilihan-peserta" value='' />

        <div class="absensi__content">
            @php
                $day = 1;
                $session = 1;
            @endphp
            @foreach ($jadwal as $j)
                @if ($session == 1)
                    <div class="absensi-day">
                        <h3 class="absensi-day__day-title">Day {{ $day }}</h3>
                        <div class="absensi-day__right">
                            <h4 class="absensi-day__caption">Submit:</h4>
                            @switch($peserta->sudahAbsen($j[0], $j[1]))
                                @case('sudah-absen')
                                    <span class="button absensi-day__btn absensi-day__btn--sudah-absen">Session
                                        {{ $session }}</span>
                                @break

                                @case('absen-sekarang')
                                    <a href="{{ route('absensi', [
                                        'mode' => 'do',
                                        'peserta' => $peserta->uid,
                                    ]) }}"
                                        class="button absensi-day__btn absensi-day__btn--absen-sekarang">Session
                                        {{ $session }}</a>
                                @break

                                @case('belum-saatnya-absen')
                                    <span class="button absensi-day__btn absensi-day__btn--belum-saatnya-absen">Session
                                        {{ $session }}</span>
                                @break

                                @case('tidak-absen')
                                    <span class="button absensi-day__btn absensi-day__btn--tidak-absen">Session
                                        {{ $session }}</span>
                                @break

                                @default
                            @endswitch
                @endif
                @if ($session == 2)
                    @switch($peserta->sudahAbsen($j[0], $j[1]))
                        @case('sudah-absen')
                            <span class="button absensi-day__btn absensi-day__btn--sudah-absen">Session
                                {{ $session }}</span>
                        @break

                        @case('absen-sekarang')
                            <a href="{{ route('absensi', [
                                'mode' => 'do',
                                'peserta' => $peserta->uid,
                            ]) }}"
                                class="button absensi-day__btn absensi-day__btn--absen-sekarang">Session
                                {{ $session }}</a>
                        @break

                        @case('belum-saatnya-absen')
                            <span class="button absensi-day__btn absensi-day__btn--belum-saatnya-absen">Session
                                {{ $session }}</span>
                        @break

                        @case('tidak-absen')
                            <span class="button absensi-day__btn absensi-day__btn--tidak-absen">Session
                                {{ $session }}</span>
                        @break

                        @default
                    @endswitch
        </div>
    </div>
    @endif
    @php
    if ($session == 2) {
        $day++;
        $session = 1;
    } else {
        $session++;
    }
    @endphp
    @endforeach
    </div>
    </div>

    <div class="absensi__index">
        <div class="absensi__bagian-index">
            <span class="absensi__bagian-index--dibuka"></span>
            <h5>Sedang Dibuka</h5>
        </div>
        <div class="absensi__bagian-index">
            <span class="absensi__bagian-index--sudah-absen"></span>
            <h5>Sudah Absen</h5>
        </div>
        <div class="absensi__bagian-index">
            <span class="absensi__bagian-index--tidak-absen"></span>
            <h5>Tidak Absen</h5>
        </div>
        <div class="absensi__bagian-index">
            <span class="absensi__bagian-index--belum-dibuka"></span>
            <h5>Belum Dibuka</h5>
        </div>
    </div>
@endsection

@section('other')
    {{-- it can be modal, etc. --}}

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        // $('.absensi__pilihan-peserta')[0].click (() => {
        //     $('#absensi__pilihan-peserta')[0].value
        // })
    </script>
@endsection
