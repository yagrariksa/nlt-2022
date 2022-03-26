@extends('template.client')

@section('title', 'Tambahkan Keranjang Alamat')
@section('seo-desc')
@section('seo-img')

@section('addclass', 'add-keranjang')

@section('content')
    <form action="{{ route('souvenir', [
        'mode' => 'add-new-kantong',
    ]) }}" method="post"
        class="add-keranjang__content">
        <div class="add-keranjang__input">
            @csrf
            <h2 class="add-keranjang__title">Buat Keranjang Alamat</h2>
            <h4 class="mobile-title">Buat Keranjang Alamat</h4>
            <x-form.input-text id="keranjang" label="Nama Keranjang (Maks. 20 Karakter)"
                value="{{ old('keranjang') ? old('keranjang') : '' }}" />
            <x-form.input-text id="nama" label="Nama Penerima" value="{{ old('nama') ? old('nama') : '' }}" />
            <x-form.input-text id="nomor" label="Nomor Penerima" value="{{ old('nomor') ? old('nomor') : '' }}" />
            <x-form.text-area id="alamat" label="Alamat Lengkap Beserta Kodepos" />
        </div>
        <div class="add-keranjang__bottom">
            <button type="submit" class="btn-primary add-keranjang__submit">BUAT KERANJANG ALAMAT</button>
            <a href="#" class="add-keranjang__batal">Batalkan</a>
        </div>
    </form>
@endsection

@section('other')
    {{-- it can be modal, etc. --}}
@endsection
