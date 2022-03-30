@extends('be.dump.temp')

@section('content')
    <a href="{{ route('souvenir', [
        'mode' => 'add',
        'object' => 'kantong',
    ]) }}">Tambah KERANJANG /
        Kantong</a>
    <a href="{{ route('souvenir', [
        'mode' => 'list',
        'object' => 'katalog',
    ]) }}">Lihat Katalog
        Barang</a>
    <table>
        <thead>
            <tr>
                <th>no</th>
                <th>nama Keranjang / Kantong</th>
                <th>alamat</th>
                <th>item</th>
                <th>aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach (Auth::user()->kantong as $k)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $k->nama }}</td>
                    <td>{{ $k->alamat }}</td>
                    <td>{{ $k->souv_total()['jumlah_item'] }}</td>
                    <td>
                        <a class="button"
                            href="{{ route('souvenir', [
                                'mode' => 'edit',
                                'object' => 'kantong',
                                'kid' => $k->kid,
                            ]) }}">edit</a>
                        <a class="button"
                            href="{{ route('souvenir', [
                                'mode' => 'detail',
                                'object' => 'kantong',
                                'kid' => $k->kid,
                            ]) }}">show</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
