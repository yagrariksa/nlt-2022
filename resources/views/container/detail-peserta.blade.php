@extends('template.client')

@section('title', 'Detail Peserta')
@section('seo-desc')
@section('seo-img')

@section('addclass', 'detail-peserta')

@section('content')
    <div class="detail-peserta__lg">
        <div class="detail-peserta__info">
            <h1>Detail Peserta</h1>
            <div class="detail-peserta__imgs">
                <img src="{{ url('storage') . '/' . $data->foto_url }}" alt=""
                    class="detail-peserta__img detail-peserta__img--foto">
            </div>
            <div class="detail-peserta__value-label">
                <h4 class="detail-peserta__label detail-peserta__label--nama">Nama</h4>
                <h4 class="detail-peserta__value detail-peserta__value--nama">{{ $data->nama }}</h4>
                <h4 class="detail-peserta__label detail-peserta__label--jabatan">Jabatan</h4>
                <h4 class="detail-peserta__value detail-peserta__value--jabatan">{{ $data->jabatan }}</h4>
                <h4 class="detail-peserta__label detail-peserta__label--email">E-Mail</h4>
                <h4 class="detail-peserta__value detail-peserta__value--email">a@a.com</h4>
                <h4 class="detail-peserta__label detail-peserta__label--notelp">No. Telepon</h4>
                <h4 class="detail-peserta__value detail-peserta__value--notelp">{{ $data->handphone }}</h4>
                <h4 class="detail-peserta__label detail-peserta__label--line">ID Line</h4>
                <h4 class="detail-peserta__value detail-peserta__value--line">{{ $data->line }}</h4>
            </div>
            <div class="detail-peserta__btns">
                <a href="{{ route('peserta', [
                    'mode' => 'edit',
                    'object' => 'peserta',
                    'uid' => $data->uid,
                ]) }}"
                    class="detail-peserta__btn detail-peserta__btn--edit"><img src="{{ url('assets/img/edit.svg') }}">
                    EDIT
                    PESERTA</a>
                @if ($data->jabatan != 'Representative AMSA Universitas')
                    <button class="detail-peserta__btn detail-peserta__btn--delete"><img
                            src="{{ url('assets/img/delete.svg') }}"></button>
                @else
                    <button class="detail-peserta__btn detail-peserta__btn--delete" disabled><img
                            src="{{ url('assets/img/delete.svg') }}"></button>
                @endif
                <form class="list-peserta__delete-dialog dialog"
                    action="{{ route('peserta', [
                        'mode' => 'delete',
                        'object' => 'peserta',
                        'uid' => $data->uid,
                    ]) }}"
                    method="post">
                    @method('delete')
                    @csrf

                    <h3 class="dialog__title">Hapus Peserta?</h3>
                    <h4 class="dialog__message">Apakah anda yakin ingin menghapus peserta
                        {{ $data->nama }}?</h4>
                    <div class="dialog__btn">
                        <span class="button dialog__btn-yes list-peserta__batal">Batal</span>
                        <button type="submit" class="dialog__btn-no">Hapus</button>
                    </div>
                </form>
                <div class="dialog__bg"></div>

            </div>
        </div>
        <div class="detail-peserta__ornament"></div>
    </div>
    <div class="detail-peserta__sm">
        <img src="{{ url('storage') . '/' . $data->foto_url }}" alt=""
            class="detail-peserta__img detail-peserta__img--foto">
        
        <a href="{{ route('peserta', [
            'mode' => 'list',
            'object' => 'peserta',
        ]) }}"
            class="button detail-peserta__btn btn-primary">TUTUP</a>
    </div>
@endsection

@section('other')
    {{-- it can be modal, etc. --}}
@endsection
