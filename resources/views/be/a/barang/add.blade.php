@extends('be.dump.temp')

@section('content')
    <form action="{{ route('a.souvenir', ['mode' => 'add-new-barang']) }}" method="post" enctype="multipart/form-data">
        <input type="text" name="nama" placeholder="nama">
        <input type="number" name="harga" placeholder="harga">
        <input type="number" name="berat" placeholder="berat">
        <select name="kategori" id="">
            <option value="" selected disabled>--pilih kategori--</option>
            @foreach ($k as $item)
                <option @if ($item->kat_id == \Request::get('kategori')) selected @endif value="{{ $item->kat_id }}">
                    {{ $item->nama }}</option>
                @if ($item->child())
                    @foreach ($item->child() as $child)
                        <option @if ($child->kat_id == \Request::get('kategori')) selected @endif value="{{ $child->kat_id }}">
                            {{ $item->nama . ' >> ' . $child->nama }}</option>
                    @endforeach
                @endif
            @endforeach
        </select>
        <textarea name="desc" id="" cols="30" rows="10"></textarea>
        <span>pick image for barang</span>
        <input type="file" name="img" id="">
        @csrf
        <button type="submit">Tambah Barang</button>
    </form>
@endsection
