@extends('be.dump.temp')

@section('content')
    <a href="{{ route('a.souvenir', [
        'mode' => 'list',
        'object' => 'kategori',
    ]) }}">Kategori</a>
    <a href="{{ route('a.souvenir', [
        'mode' => 'list',
        'object' => 'barang',
    ]) }}">Barang</a>
    <a href="{{ route('a.souvenir', [
        'mode' => 'list',
        'object' => 'kantong',
    ]) }}">Penjualan</a>
@endsection
