@extends('be.dump.temp')

@section('content')
    <form action="{{ route('souvenir', [
        'mode' => 'add-new-kantong',
    ]) }}" method="post">
        @csrf
        <span>Nama KANTONG / KERANJANG</span>
        <input type="text" name="nama">
        <span>Alamat untuk KANTONG / KERANJANG</span>
        <textarea name="alamat" id="" cols="30" rows="10"></textarea>
        <button type="submit">BUAT</button>
    </form>
@endsection
