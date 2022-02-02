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
        <h2 class="add-edit-peserta__title">Tambah Peserta</h2>
        <div class="add-edit-peserta__input">
            <div class="add-edit-peserta__form-left">
                <x-form.input-text id="email" label="Email" value="{{ old('email') }}" />
                <x-form.input-text id="nama" label="Nama" value="{{ old('nama') }}" />
                <x-form.input-text id="handphone" label="Nomor Telepon" value="{{ old('handphone') }}" />
            </div>
            <x-form.input-text-with-help id="alergi" label="Alergi Makan Apa?*" helper="*Kosongi bila tidak ada"
                class=" add-edit-peserta__alergi" value="{{ old('alergi') }}" />
            <div class="add-edit-peserta__vegetarian form-radio @if ($errors->has('vegan')) has-error @endif">
                <h4>Vegetarian?</h4>
                @if (old('vegan') == 'Iya')
                    <x-form.input-radio name="vegan" label="Iya" checked="checked" />
                @else
                    <x-form.input-radio name="vegan" label="Iya" />
                @endif
                @if (old('vegan') == 'Tidak')
                    <x-form.input-radio name="vegan" label="Tidak" checked="checked" />
                @else
                    <x-form.input-radio name="vegan" label="Tidak" />
                @endif
                @if ($errors->has('vegan'))
                    <h6 class="form-help" style="bottom: -1rem;"> {{ $errors->first('vegan') }}</h6>
                @endif
            </div>
            <div class="add-edit-peserta__form-right">
                <x-form.select-options id="jabatan" label="Jabatan" options='{
                                            "1":"Ketua AMSA Universitas",
                                            "2":"Anggota AMSA Universitas",
                                            "3":"Lainnya"
                                        }' value="{{ old('jabatan') }}" />
                <x-form.input-img id="ktp" label="Foto KTP (JPG atau PNG)" value="{{ old('ktp') }}" />
                <x-form.input-img id="pas" label="Pas Foto (JPG atau PNG)" value="{{ old('pas') }}" />
            </div>
        </div>
        <div class="add-edit-peserta__buttons">
            <a href="{{ URL::previous() }}">Batalkan</a>
            <button type="submit" class="btn-primary">TAMBAH PESERTA</button>
        </div>
    </form>
@endsection

@section('other')
    {{-- it can be modal, etc. --}}
@endsection
