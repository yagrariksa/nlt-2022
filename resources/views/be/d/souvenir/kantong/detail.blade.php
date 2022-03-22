@extends('be.dump.temp')

@section('content')
    <div class="" style="display: flex; flex-direction:column; gap: .5rem">
        <span>Nama Katalog : {{ $k->nama }}</span>
        <span>Alamat : {{ $k->alamat }}</span>
        <span>Jumlah Item : {{ $k->souv_total()['jumlah_item'] }}</span>
        <span>Total Harga : {{ $k->souv_total()['total_harga'] }}</span>
        <span>Total Berat : {{ $k->souv_total()['total_berat'] }}</span>
        <span>Total Ongkir : {{ $k->total_ongkir }}</span>
        <a class="button"
            href="{{ route('souvenir', [
                'mode' => 'edit',
                'object' => 'kantong',
                'kid' => $k->kid,
            ]) }}">Edit
            Katalog</a>
        <form style="margin: 0; padding: 0" action="#" method="post">
            @csrf
            @method('delete')
            <input type="hidden" name="kid" value="{{ $k->kid }}">
            <button type="submit">Hapus Katalog ini</button>
        </form>
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
                <th>action</th>
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
                    <td>
                        <a class="button"
                            href="{{ route('souvenir', [
                                'object' => 'katalog',
                                'mode' => 'edit',
                                's_id' => $item->souv_id,
                            ]) }}">Edit</a>
                        <form style="margin: 0; padding: 0"
                            action="{{ route('souvenir', [
                                'mode' => 'delete-my-item',
                                'id' => $item->id,
                            ]) }}"
                            method="post">
                            @csrf
                            @method('delete')
                            <input type="hidden" name="kid" value="{{ $k->kid }}">
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @dump($k)
@endsection
