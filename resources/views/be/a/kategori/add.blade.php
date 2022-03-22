@extends('be.dump.temp')

@section('content')
    <form action="{{ route('a.souvenir', [
        'mode' => 'add-new-kategori',
    ]) }}" method="post">
        @csrf
        <input type="text" name="nama" placeholder="nama kategori">
        <select name="parent" id="">
            <option value="" selected disabled>--pilih parent--</option>
            @foreach ($k as $item)
                <option value="{{ $item->id }}">{{ $item->nama }}</option>
            @endforeach
        </select>
        <button type="submit">BUAT</button>
    </form>
@endsection
