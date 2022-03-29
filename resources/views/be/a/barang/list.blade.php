@extends('be.dump.temp')

@section('content')
    <a href="{{ route('a.souvenir', [
        'mode' => 'add',
        'object' => 'barang',
    ]) }}">add
        item</a>

    <input type="text" name="" id="admin__barang__search-field">

    <table>
        <thead>
            <tr>
                <th>no</th>
                <th>nama</th>
                <th>kategori</th>
                <th>aksi</th>
            </tr>
        </thead>
        <tbody>
            @php
                $count = 1;
            @endphp
            @foreach ($k as $item)
                @foreach ($item->barang as $barang)
                    <tr class="souv__barang__data-barang">
                        <td>{{ $count }}</td>
                        <td>{{ $barang->nama }}</td>
                        <td><span class="badges">{{ $item->nama }}</span></td>
                        <td>
                            <a
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
                        </td>
                    </tr>
                    @php
                        $count++;
                    @endphp
                @endforeach
                @foreach ($item->child() as $child)
                    @foreach ($child->barang as $barang)
                        <tr class="souv__barang__data-barang">
                            <td>{{ $count }}</td>
                            <td>{{ $barang->nama }}</td>
                            <td>
                                <span class="badges">{{ $item->nama }}</span>
                                <span class="badges"
                                    style="background-color: rgba(0, 0, 255, 0.39)">{{ $child->nama }}</span>
                            </td>
                            <td>
                                <a
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
                            </td>
                        </tr>
                        @php
                            $count++;
                        @endphp
                    @endforeach
                @endforeach
            @endforeach
        </tbody>
    </table>

    <script>
        var data = document.querySelectorAll('.souv__barang__data-barang')

        document.querySelector('#admin__barang__search-field').addEventListener('input', (e) => {
            var value = e.target.value

            data.forEach(e => {
                e.style.display = 'none'
            });

            if (value == null) {
                data.forEach(e => {
                    e.style.display = 'table-row'
                })
            } else {
                data.forEach(e => {
                    if (e.innerText.toLowerCase().includes(value.toLowerCase())) {
                        e.style.display = 'table-row'
                    }
                })
            }
        })
    </script>
@endsection
