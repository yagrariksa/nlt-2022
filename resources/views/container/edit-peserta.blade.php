@extends('template.client')

@section('title', 'Edit Peserta')
@section('seo-desc', '...')

@section('addclass', 'add-edit-peserta')

@section('content')
    <form
        action="{{ route('peserta', [
            'mode' => 'edit',
            'object' => 'peserta',
            'uid' => app('request')->input('uid'),
        ]) }}"
        method="post" enctype="multipart/form-data">
        @csrf
        <div class="add-edit-peserta__input">
            <h2 class="add-edit-peserta__title">Edit Peserta</h2>
            <div class="add-edit-peserta__form-left">
                <x-form.input-text id="email" label="Email" value="{{ old('email') ? old('email') : $data->email }}" />
                <x-form.input-text id="nama" label="Nama" value="{{ old('nama') ? old('nama') : $data->nama }}" />
                <x-form.input-text id="handphone" label="Nomor Telepon"
                    value="{{ old('handphone') ? old('handphone') : $data->handphone }}" />
                <x-form.input-text id="line" label="ID Line" value="{{ old('line') ? old('line') : $data->line }}" />
            </div>
            <div class="add-edit-peserta__form-right">
                @if ($data->jabatan == 'Representative AMSA Universitas')
                    <x-form.input-text id="jabatan" label="Jabatan" value="{{ $data->jabatan }}" attr="readonly" />
                @else
                    <x-form.select-options id="jabatan" label="Jabatan" options='EB AMSA-Indonesia,Member'
                        value="{{ old('jabatan') ? old('jabatan') : $data->jabatan }}" class="" />
                @endif

                <x-form.input-img id="pas" label="Pas Foto (JPG atau PNG)" value="{{ $data->foto_url }}" />
            </div>
        </div>
        <div class="add-edit-peserta__buttons">
            <a href="">Batalkan</a>
            <button type="submit" class="btn-primary">EDIT PESERTA</button>
        </div>
    </form>
@endsection

@section('other')
    {{-- it can be modal, etc. --}}
    <div class="add-edit-peserta__dialog dialog">
        <h3 class="dialog__title blue">Batalkan Edit Peserta?</h3>
        <h4 class="dialog__message">Apakah anda ingin membatalkan pengeditan data peserta? Semua Informasi yang anda
            masukkan tidak akan disimpan.</h4>
        <div class="dialog__btn">
            <span class="button dialog__btn-yes add-edit-peserta__batal">Tidak</span>
            <a href="{{ route('peserta') }}" class="button dialog__btn-no">Ya, Batalkan</a>
        </div>
    </div>
    <div class="dialog__bg"></div>
@endsection
