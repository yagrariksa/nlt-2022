@extends('template.admin')

@section('title', 'Tambah Barang')
@section('seo-desc')

@section('addclass', 'add-edit-barang')

@section('content')
    <form action="{{ route('a.souvenir', ['mode' => 'add-new-barang']) }}" method="post" enctype="multipart/form-data">
        @csrf
        <h2 class="add-edit-barang__title">Tambah Barang</h2>
        <div class="add-edit-barang__form-left">
            <x-form.input-text id="nama" label="Nama" value="{{ old('nama') ? old('nama') : '' }}" />
            <x-form.input-text id="harga" label="Harga" value="{{ old('harga') ? old('harga') : '' }}" />
            <x-form.input-text id="berat" label="Berat" value="{{ old('berat') ? old('berat') : '' }}" />
            <x-form.text-area id="desc" label="Deskripsi" value="{{ old('desc') ? old('desc') : '' }}" />
        </div>

        <div class="add-edit-barang__form-right">
            <div class="form-group form-group--select">
                <select name="kategori" id="kategori">
                    <option value=""></option>
                    @foreach ($k as $item)
                        <option {{ $item->kat_id == \Request::get('kategori') ? 'selected' : '' }}
                            value="{{ $item->kat_id }}">{{ $item->nama }}</option>
                        @if ($item->child())
                            @foreach ($item->child() as $child)
                                <option {{ $child->kat_id == \Request::get('kategori') ? 'selected' : '' }}
                                    value="{{ $child->kat_id }}">{{ $item->nama }} >> {{ $child->nama }}</option>
                            @endforeach
                        @endif
                    @endforeach
                </select>
                <label for="select" class="form-group__control-label">Pilih Kategori</label>
                <i class="form-group__bar"></i>
            </div>

            <x-form.input-img id="img" label="Foto Barang (Ukuran 1:1)" />
        </div>

        <div class="add-edit-barang__btns">
            <a href="{{ route('a.souvenir', ['mode' => 'list', 'object' => 'barang']) }}">Batalkan</a>
            <button type="submit" class="btn-primary">TAMBAH BARANG</button>
        </div>
    </form>
@endsection

@section('other')
    {{-- it can be modal, etc. --}}
@endsection
