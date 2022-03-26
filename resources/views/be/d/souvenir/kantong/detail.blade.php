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
        <a class="button"
            href="{{ route('souvenir', [
                'mode' => 'edit',
                'object' => 'kantong',
                'kid' => $k->kid,
            ]) }}">Edit
            KANTONG / KERANJANG</a>
        @if (!$k->invoice_url)
            <form style="margin: 0; padding: 0"
                action="{{ route('souvenir', [
                    'mode' => 'delete-my-kantong',
                    'kid' => $k->kid,
                ]) }}"
                method="post">
                @csrf
                @method('delete')
                <input type="hidden" name="kid" value="{{ $k->kid }}">
                <button type="submit">Hapus KANTONG / KERANJANG ini</button>
            </form>
        @endif

        @if ($k->bukti_ongkir)
            {{-- if tanggal sudah masa pembayaran --}}
            @if ($k->invoice_url)
                <span>bukti bayar :
                    <img src="{{ url('storage') . '/' . $k->invoice_url }}" alt="{{ $k->invoice_url }}"
                        style="max-width: 10rem">
                </span>
            @else
                <form
                    action="{{ route('souvenir', [
                        'mode' => 'submit-invoice',
                        'kid' => $k->kid,
                    ]) }}"
                    method="post" style="margin: 0; padding: 0" enctype="multipart/form-data">
                    @csrf
                    <span>Pick Image for Bukti Bayar</span>
                    <input type="file" name="img" id="">
                    <button type="submit">SUBMIT BUKTI BAYAR</button>
                </form>
            @endif
            {{-- else belum masa pembayaran
            tampilkan info tentang periode pembayaran --}}
        @else
            <hr style="height: 1px;
                        width: 100%;
                        background-color: black;">
            <span>jika anda tidak merubah pesanan, kunjungi laman ### untuk mengecek ongkir</span>
            <span>lampirkan screenshot tarif ongkir sesuai berat-totalx dan tujuan (surabaya - alamat tujuan)</span>
            <span>dan jangan lupa tambahkan nominal ongkir pada kolom ongkir</span>
            <form
                action="{{ route('souvenir', [
                    'mode' => 'submit-ongkir',
                    'kid' => $k->kid,
                ]) }}"
                method="post" enctype="multipart/form-data" style="padding: 0; margin:0">
                @csrf
                <input type="number" name="ongkir" id="" placeholder="harga ongkir">
                <span>bukti SS</span>
                <input type="file" name="img" id="">
                <button type="submit">submit</button>
            </form>
            <hr style="height: 1px;
                        width: 100%;
                        background-color: black;">
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
