@extends('template.client')

@section('title', 'Menambahkan Peserta')
@section('seo-desc', '...')

@section('addclass', 'add-edit-peserta')

@section('content')
    <form action="{{ route('peserta', [
        'mode' => 'add',
        'object' => 'peserta',
    ]) }}" method="post"
        enctype="multipart/form-data">
        @csrf
        <div class="add-edit-peserta__input">
            <h2 class="add-edit-peserta__title">Tambah Peserta</h2>
            <div class="add-edit-peserta__form-left">
                <x-form.input-text id="email" label="Email" value="{{ old('email') }}" />
                <x-form.input-text id="nama" label="Nama" value="{{ old('nama') }}" />
                <x-form.input-text id="handphone" label="Nomor Telepon" value="{{ old('handphone') }}" />
                <x-form.input-text id="line" label="ID Line" value="{{ old('line') }}" />
            </div>
            <div class="add-edit-peserta__form-right">
                <x-form.select-options id="jabatan" label="Jabatan" options='{
                    "1":"EB AMSA-Indonesia",
                    "2":"Member"
                }' value="{{ old('jabatan') }}" class="" />
                <x-form.input-img id="pas" label="Pas Foto (JPG atau PNG)" value="{{ old('pas') }}" />
            </div>
        </div>
        <div class="add-edit-peserta__buttons">
            <a href="">Batalkan</a>
            <button type="submit" class="btn-primary">TAMBAH PESERTA</button>
        </div>
    </form>
@endsection

@section('other')
    {{-- it can be modal, etc. --}}
    <div class="add-edit-peserta__dialog dialog">
        <h3 class="dialog__title blue">Batalkan Menambahkan Peserta?</h3>
        <h4 class="dialog__message">Apakah anda ingin membatalkan penambahan data peserta? Semua Informasi yang anda
            masukkan tidak akan disimpan.</h4>
        <div class="dialog__btn">
            <span class="button dialog__btn-yes add-edit-peserta__batal">Tidak</span>
            <a href="{{ route('peserta') }}" class="button dialog__btn-no">Ya, Batalkan</a>
        </div>
    </div>
    <div class="dialog__bg"></div>
@endsection
