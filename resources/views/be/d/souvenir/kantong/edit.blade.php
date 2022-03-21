@extends('be.dump.temp')

@section('content')
    <form action="{{ route('souvenir', [
        'mode' => 'edit-my-kantong',
    ]) }}" method="post">
        @csrf
        <input type="hidden" name="kid" value="{{ $k->kid }}">
        <span>Nama KANTONG / KERANJANG</span>
        <input type="text" name="nama" value="{{ $k->nama }}">
        <span>Alamat untuk KANTONG / KERANJANG</span>
        <textarea name="alamat" id="" cols="30" rows="10">{{ $k->alamat }}</textarea>
        <button type="submit">UBAH</button>
    </form>
@endsection
