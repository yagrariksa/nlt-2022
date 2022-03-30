@extends('be.dump.temp')

@section('content')
    <a
        href="{{ route('a.souvenir', [
            'mode' => 'add',
            'object' => 'kategori',
            'key' => 'parent',
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
                <form
                    action="{{ route('a.souvenir', [
                        'mode' => 'delete-my-kategori',
                        'key' => $item->kat_id,
                    ]) }}"
                    method="post" style="padding: 0; margin:0; display: inline">
                    @csrf
                    @method('delete')
                    <button type="submit">delete</button>
                </form>
            </li>
            <ul>
                @foreach ($item->child() as $child)
                    <li>{{ $child->nama }} <a
                            href="{{ route('a.souvenir', [
                                'mode' => 'edit',
                                'object' => 'kategori',
                                'key' => $child->kat_id,
                            ]) }}">edit</a>
                            <form
                            action="{{ route('a.souvenir', [
                                'mode' => 'delete-my-kategori',
                                'key' => $child->kat_id,
                            ]) }}"
                            method="post" style="padding: 0; margin:0; display: inline">
                            @csrf
                            @method('delete')
                            <button type="submit">delete</button>
                        </form>
                    </li>
                @endforeach
                <li><a
                        href="{{ route('a.souvenir', [
                            'mode' => 'add',
                            'object' => 'kategori',
                            'key' => $item->kat_id,
                        ]) }}">add
                        sub-kat</a>
                </li>
            </ul>
        @endforeach
    </ul>
@endsection
