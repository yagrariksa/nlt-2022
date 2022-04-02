@extends('template.client')

@section('title', 'Tambahkan Keranjang')
@section('seo-desc')
@section('seo-img')

@section('addclass', 'add-keranjang')

@section('content')
    <form action="{{ route('souvenir', [
        'mode' => 'edit-my-kantong',
    ]) }}" method="post"
        class="add-keranjang__content">
        <div class="add-keranjang__input">
            @csrf
            <h2 class="add-keranjang__title">Edit Keranjang</h2>
            <h4 class="mobile-title">Edit Keranjang</h4>
            <input type="hidden" name="kid" value="{{ $k->kid }}">
            <x-form.input-text id="nama" label="Nama Keranjang (Maks. 20 Karakter)"
                value="{{ old('nama') ? old('nama') : $k->nama }}" />
            <x-form.input-text id="penerima" label="Nama Penerima"
                value="{{ old('penerima') ? old('penerima') : $k->penerima }}" />
            <x-form.input-text id="no" label="Nomor Penerima" value="{{ old('no') ? old('no') : $k->no }}" />
            @if ($k->invoice_url)
                <x-form.text-area id="alamat" label="Alamat Lengkap Beserta Kodepos"
                    value="{{ old('alamat') ? old('alamat') : $k->alamat }}" attr="disabled" />
            @else
                <x-form.text-area id="alamat" label="Alamat Lengkap Beserta Kodepos"
                    value="{{ old('alamat') ? old('alamat') : $k->alamat }}" />
            @endif
        </div>
        <div class="add-keranjang__bottom">
            <button type="submit" class="btn-primary add-keranjang__submit">EDIT KERANJANG</button>
            <a href="{{ route('souvenir', [
                'mode' => 'detail',
                'object' => 'kantong',
                'kid' => $k->kid,
            ]) }}"
                class="add-keranjang__batal">Batalkan</a>
        </div>
    </form>
@endsection

@section('other')
    {{-- it can be modal, etc. --}}
@endsection
