@extends('be.dump.temp')

@section('content')
    <div class="" style="display: flex; flex-direction:column; gap: .5rem">
        <span>Nama KANTONG / KERANJANG : {{ $k->nama }}</span>
        <span>Alamat : {{ $k->alamat }}</span>
        <span>Penerima : {{ $k->penerima }}</span>
        <span>NO Penerima : {{ $k->no }}</span>
        <span>Jumlah Item : {{ $k->souv_total()['jumlah_item'] }}</span>
        <span>Total Harga : {{ $k->souv_total()['total_harga'] }}</span>
        <span>Total Berat : {{ $k->souv_total()['total_berat'] }}</span>
        <span>Total Ongkir : {{ $k->total_ongkir }}</span>
        <span>bukti ongkir : </span>
        @if ($k->bukti_ongkir)
            <img src="{{ url('storage') . '/' . $k->bukti_ongkir }}" alt="{{ $k->bukti_ongkir }}" style="max-width: 30rem">
        @endif
    </div>
    <table>
        <thead>
            <tr>
                <th>no</th>
                <th>item</th>
                <th style="width: 16rem">ket</th>
                <th>jml@harga</th>
                <th>total</th>
                <th>berat</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($k->souvenir as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama }}</td>
                    <td style="width: 16rem">{{ $item->catatan }}</td>
                    <td>{{ $item->jumlah }} * {{ $item->harga }}</td>
                    <td>{{ $item->total_harga }}</td>
                    <td>{{ $item->berat_gram }} -> {{ $item->total_berat }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
