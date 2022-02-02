@extends('template.client')

@section('title', 'Menambahkan Peserta')
@section('seo-desc', '...')

@section('addclass', 'add-edit-peserta')

@section('content')
    {{ $data }}
    <form action="{{ route('peserta', [
        'mode' => 'add',
        'object' => 'peserta',
    ]) }}" method="post"
        enctype="multipart/form-data">
        @csrf
        <h2 class="add-edit-peserta__title">Edit Peserta</h2>
        <div class="add-edit-peserta__input">
            <div class="add-edit-peserta__form-left">
                <x-form.input-text id="email" label="Email" value="{{ old('email') ? old('email') : $data->email }}" />
                <x-form.input-text id="nama" label="Nama" value="{{ old('nama') ? old('nama') : $data->nama }}" />
                <x-form.input-text id="handphone" label="Nomor Telepon"
                    value="{{ old('handphone') ? old('handphone') : $data->handphone }}" />
            </div>
            <x-form.input-text-with-help id="alergi" label="Alergi Makan Apa?*" helper="*Kosongi bila tidak ada"
                class=" add-edit-peserta__alergi" value="{{ old('alergi') ? old('alergi') : $data->alergi }}" />
            <div class="add-edit-peserta__vegetarian form-radio @if ($errors->has('vegan')) has-error @endif">
                <h4>Vegetarian?</h4>
                <x-form.input-radio name="vegan" label="Iya" />
                <x-form.input-radio name="vegan" label="Tidak" />
                @if ($errors->has('vegan'))
                    <h6 class="form-help" style="bottom: -1rem;"> {{ $errors->first('vegan') }}</h6>
                @endif
            </div>
            <div class="add-edit-peserta__form-right">
                <x-form.input-text id="jabatan" label="Jabatan" value="{{ $data->jabatan }}" attr="readonly" />
                {{-- <x-form.select-options id="jabatan" label="Jabatan" options='{
                    "1":"Ketua AMSA Universitas",
                    "2":"Anggota AMSA Universitas",
                    "3":"Lainnya"
                }' /> --}}
                <x-form.input-img id="ktp" label="Foto KTP (JPG atau PNG)" value="{{ $data->ktp_url }}" />
                <x-form.input-img id="pas" label="Pas Foto (JPG atau PNG)" value="{{ $data->foto_url }}" />
            </div>
        </div>
        <div class="add-edit-peserta__buttons">
            <a href="{{ URL::previous() }}">Batalkan</a>
            <button type="submit" class="btn-primary">EDIT PESERTA</button>
        </div>
    </form>
@endsection

@section('other')
    {{-- it can be modal, etc. --}}
@endsection
