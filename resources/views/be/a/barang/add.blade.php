@extends('be.dump.temp')

@section('content')
@dump($errors)
    <form action="{{ route('a.souvenir', ['mode' => 'add-new-barang']) }}" method="post" enctype="multipart/form-data">
        <input type="text" name="nama" placeholder="nama">
        <input type="number" name="harga" placeholder="harga">
        <input type="number" name="berat" placeholder="berat">
        <select name="kategori" id="">
            <option value="" selected disabled>--pilih kategori--</option>
            @foreach ($k as $item)
                <option @if ($item->kat_id == \Request::get('kategori')) selected @endif value="{{ $item->kat_id }}">
                    {{ $item->parent() ? $item->parent()->nama . ' >> ' : '' }}
                    {{ $item->nama }}</option>
            @endforeach
        </select>
        <textarea name="desc" id="" cols="30" rows="10"></textarea>
        <span>pick image for barang</span>
        <input type="file" name="img" id="">
        @csrf
        <button type="submit">Tambah Barang</button>
    </form>
@endsection
