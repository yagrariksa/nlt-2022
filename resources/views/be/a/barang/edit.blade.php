@extends('be.dump.temp')

@section('content')
    <form action="{{ route('a.souvenir', ['mode' => 'edit-my-barang', 'key' => $b->bar_id]) }}" method="post"
        enctype="multipart/form-data" style="padding-top: 0; padding-bottom: 0">
        <input type="text" value="{{ $b->nama }}" name="nama" placeholder="nama">
        <input type="number" value="{{ $b->harga }}" name="harga" placeholder="harga">
        <input type="number" value="{{ $b->berat }}" name="berat" placeholder="berat">
        <select name="kategori" id="">
            <option value="" selected disabled>--pilih kategori--</option>
            @foreach ($k as $item)
                <option @if ($item->kat_id == $b->kategori_id) selected @endif value="{{ $item->kat_id }}">
                    {{ $item->parent() ? $item->parent()->nama . ' >> ' : '' }}
                    {{ $item->nama }}</option>
            @endforeach
        </select>
        <textarea name="desc" id="" cols="30" rows="10">{{ $b->desc }}</textarea>

        <span>pick image for tambah barang</span>
        <input type="file" name="img" id="">
        @csrf
        <button type="submit">Edit Barang</button>
    </form>
    <div class="" style="display: flex; gap: .5rem; border: 1px solid black; padding: .3rem">
        @foreach ($b->gambar as $g)
            <div class="" style="display: flex; flex-direction: column;">
                <img src="{{ url('storage') . '/' . $g->url }}" alt="{{ $g->url }}"
                    style="width: 5rem; height: fit-content;">
                <form action="{{ route('a.souvenir', ['mode' => 'delete-my-gambar', 'key' => $g->id]) }}" method="post"
                    style="margin: 0; padding: 0">
                    @csrf
                    @method('delete')
                    <button type="submit">DELETE</button>
                </form>
            </div>
        @endforeach
    </div>
@endsection
