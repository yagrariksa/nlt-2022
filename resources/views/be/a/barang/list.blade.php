@extends('be.dump.temp')

@section('content')
    <a href="{{ route('a.souvenir', [
        'mode' => 'add',
        'object' => 'barang',
    ]) }}">add
        item</a></li>
    <ul>
        @foreach ($k as $item)
            <li>{{ $item->nama }}</li>
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
                        <form
                            action="{{ route('a.souvenir', [
                                'mode' => 'delete-my-barang',
                                'key' => $barang->bar_id,
                            ]) }}"
                            method="post" style="padding: 0; margin: 0; display: inline">
                            @csrf
                            @method('delete')
                            <button type="submit">HAPUS</button>
                        </form>
                    </li>
                @endforeach
            </ul>
            @foreach ($item->child() as $child)
                <li>{{ $item->nama }} >> {{ $child->nama }}</li>
                <ul>
                    <li><a
                            href="{{ route('a.souvenir', [
                                'mode' => 'add',
                                'object' => 'barang',
                                'kategori' => $child->kat_id,
                            ]) }}">add
                            item</a></li>
                    @foreach ($child->barang as $barang)
                        <li>{{ $barang->nama }} - <a
                                href="{{ route('a.souvenir', [
                                    'mode' => 'edit',
                                    'object' => 'barang',
                                    'key' => $barang->bar_id,
                                ]) }}">Edit</a>
                                 <form
                                 action="{{ route('a.souvenir', [
                                     'mode' => 'delete-my-barang',
                                     'key' => $barang->bar_id,
                                 ]) }}"
                                 method="post" style="padding: 0; margin: 0; display: inline">
                                 @csrf
                                 @method('delete')
                                 <button type="submit">HAPUS</button>
                        </li>
                    @endforeach
                </ul>
            @endforeach
        @endforeach
    </ul>
@endsection
