@extends('template.client')

@section('title', 'Tambahkan Keranjang')
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
            <h2 class="add-keranjang__title">Buat Keranjang</h2>
            <h4 class="mobile-title">Buat Keranjang</h4>
            <x-form.input-text id="nama" label="Nama Keranjang (Maks. 20 Karakter)"
                value="{{ old('nama') ? old('nama') : '' }}" />
            <x-form.input-text id="penerima" label="Nama Penerima" value="{{ old('penerima') ? old('penerima') : '' }}" />
            <x-form.input-text id="no" label="Nomor Penerima" value="{{ old('no') ? old('no') : '' }}" />
            <x-form.text-area id="alamat" label="Alamat Lengkap Beserta Kodepos" />
        </div>
        <div class="add-keranjang__bottom">
            <button type="submit" class="btn-primary add-keranjang__submit">BUAT KERANJANG</button>
            <a href="#" class="add-keranjang__batal">Batalkan</a>
        </div>
    </form>
@endsection

@section('other')
    {{-- it can be modal, etc. --}}
@endsection
