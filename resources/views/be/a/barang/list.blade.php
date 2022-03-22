@extends('be.dump.temp')

@section('content')
    <a href="{{ route('a.souvenir', [
        'mode' => 'add',
        'object' => 'barang',
    ]) }}">add
        item</a></li>
    <ul>
        @foreach ($k as $item)
            <li>{{ $item->parent() ? $item->parent()->nama . ' >> ' : '' }} {{ $item->nama }}</li>
            <ul>
                <li><a
                        href="{{ route('a.souvenir', [
                            'mode' => 'add',
                            'object' => 'barang',
                            'kategori' => $item->kat_id,
                        ]) }}">add
                        item</a></li>
                @foreach ($item->barang as $barang)
                    <li>{{ $barang->nama }} - <a
                            href="{{ route('a.souvenir', [
                                'mode' => 'edit',
                                'object' => 'barang',
                                'key' => $barang->bar_id,
                            ]) }}">Edit</a>
                    </li>
                @endforeach
            </ul>
        @endforeach
    </ul>
@endsection
