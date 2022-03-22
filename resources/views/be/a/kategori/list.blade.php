@extends('be.dump.temp')

@section('content')
    <a href="{{ route('a.souvenir', [
        'mode' => 'add',
        'object' => 'kategori',
    ]) }}">Tambah
        Kategori</a>
    <ul>
        @foreach ($data as $item)
            <li>{{ $item->nama }} <a
                    href="{{ route('a.souvenir', [
                        'mode' => 'edit',
                        'object' => 'kategori',
                        'key' => $item->kat_id,
                    ]) }}">edit</a>
            </li>
            <ul>
                @foreach ($item->child() as $child)
                    <li>{{ $child->nama }} <a
                            href="{{ route('a.souvenir', [
                                'mode' => 'edit',
                                'object' => 'kategori',
                                'key' => $child->kat_id,
                            ]) }}">edit</a>
                    </li>
                @endforeach
            </ul>
        @endforeach
    </ul>
@endsection
