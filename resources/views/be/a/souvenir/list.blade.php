@extends('be.dump.temp')

@section('content')
    <table>
        <thead>
            <tr>
                <th>no</th>
                <th>barang</th>
                <th>jumlah terbeli</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($barang as $b)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $b->nama }}</td>
                    <td>{{ $b->terbeli_count() }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Penerima</th>
                <th>Univ</th>
                <th>Jumlah Barang</th>
                <th>Total Harga</th>
                <th>Bukti Pembayaran</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kantong as $k)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td><a
                            href="{{ route('a.souvenir', [
                                'mode' => 'detail',
                                'object' => 'kantong',
                                'key' => $k->kid,
                            ]) }}">{{ $k->penerima }}</a>
                    </td>
                    <td>{{ $k->univ->akronim }}</td>
                    <td>{{ $k->souv_total()['jumlah_item'] }}</td>
                    <td>{{ $k->souv_total()['total_harga'] }}</td>
                    <td>
                        @if ($k->invoice_url)
                            <a href="{{ url('storage') . '/' . $k->invoice_url }}">Lihat Invoice</a>
                        @else
                            Belum bayar
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
