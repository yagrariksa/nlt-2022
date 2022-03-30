@extends('be.dump.temp')

@section('content')
    <form action="{{ route('a.souvenir', [
        'mode' => 'add-new-kategori',
    ]) }}" method="post">
        @csrf
        @if (\Request::get('key') == 'parent')
            <h2>Tambah Kategori</h2>
        @else
            <h2>Tambah Sub-Kategori <span style="color: red">Dari {{ $k->nama }}</span >
            </h2>
        @endif
        <input type="text" name="nama" placeholder="nama kategori">
        <input type="hidden" name="parent" value="{{ $k ? $k->id : '' }}">
        <button type="submit">BUAT</button>
    </form>
@endsection
