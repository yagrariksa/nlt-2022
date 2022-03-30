@extends('template.admin')

@section('title', 'Tambah Barang')
@section('seo-desc')

@section('addclass', 'add-edit-barang')

@section('content')
    <form action="{{ route('a.souvenir', ['mode' => 'edit-my-barang', 'key' => $b->bar_id]) }}" method="post"
        enctype="multipart/form-data">
        @csrf
        <h2 class="add-edit-barang__title">Edit Barang</h2>
        <div class="add-edit-barang__form-left">
            <x-form.input-text id="nama" label="Nama" value="{{ old('nama') ? old('nama') : $b->nama }}" />
            <x-form.input-text id="harga" label="Harga" value="{{ old('harga') ? old('harga') : $b->harga }}" />
            <x-form.input-text id="berat" label="Berat" value="{{ old('berat') ? old('berat') : $b->berat }}" />
            <x-form.text-area id="desc" label="Deskripsi" value="{{ old('desc') ? old('desc') : $b->desc }}" />
        </div>

        <div class="add-edit-barang__form-right">
            <div class="form-group form-group--select">
                <select name="kategori" id="kategori">
                    <option value=""></option>
                    @foreach ($k as $item)
                        <option {{ $item->kat_id == $b->kategori_id ? 'selected' : '' }} 
                            value="{{ $item->kat_id }}">{{ $item->nama }}</option>
                    @endforeach
                </select>
                <label for="select" class="form-group__control-label">Pilih Kategori</label>
                <i class="form-group__bar"></i>
            </div>

            <x-form.input-img id="img" label="Foto Barang (Ukuran 1:1)" />
        </div>

        <div class="add-edit-barang__btns">
            <a href="{{ route('a.souvenir', ['mode' => 'list', 'object' => 'barang']) }}">Batalkan</a>
            <button type="submit" class="btn-primary">SIMPAN PERUBAHAN BARANG</button>
        </div>
    </form>

    <div class="add-edit-barang__img-container">
        <h4>Foto Terupload</h4>
        <div class="add-edit-barang__imgs">
            <div class="add-edit-barang__img-overflow">
                @foreach ($b->gambar as $g)
                    <div class="add-edit-barang__img">
                        <img src="{{ url('storage') . '/' . $g->url }}" alt="{{ $g->url }}">
                        <form action="{{ route('a.souvenir', ['mode' => 'delete-my-gambar', 'key' => $g->id]) }}"
                            method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="h5">Click to delete</button>
                        </form>
                        <span></span>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

@section('other')
    {{-- it can be modal, etc. --}}

    <script>
        const elementSpan = [];

        document.querySelectorAll(".add-edit-barang__img").forEach((elm, x) => {
            let addAnimation = false;
            if (!elementSpan[x])
                elementSpan[x] = elm.querySelector("span");

            elm.addEventListener("mouseover", e => {
                elementSpan[x].style.left = e.pageX - elm.offsetLeft + "px";
                elementSpan[x].style.top = e.pageY - elm.offsetTop + "px";
            });

            elm.addEventListener("mouseout", e => {
                elementSpan[x].style.left = e.pageX - elm.offsetLeft + "px";
                elementSpan[x].style.top = e.pageY - elm.offsetTop + "px";
            });
        });
    </script>
@endsection
