<table border="1">
    <thead>
        <tr>
            <th>no</th>
            <th>nama KERANGJANG</th>
            <th>univ</th>
            <th>nama penerima</th>
            <th>alamat</th>
            <th>nomor penerima</th>
            <th>total harga</th>
            <th>total berat</th>
            <th>total ongkir</th>
            <th>bukti ongkir</th>
            <th>bukti pembayaran</th>
            <th>no-pesanan</th>
            <th>pesanan</th>
            <th>jumlah</th>
            <th>keterangan</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($kantong as $k)
            <tr>
                <td @if (sizeof($k->souvenir) != 0) rowspan="{{ sizeof($k->souvenir) }}" @endif>
                    {{ $loop->iteration }}</td>
                <td @if (sizeof($k->souvenir) != 0) rowspan="{{ sizeof($k->souvenir) }}" @endif>
                    {{ $k->nama }}
                </td>
                <td @if (sizeof($k->souvenir) != 0) rowspan="{{ sizeof($k->souvenir) }}" @endif>
                    {{ $k->univ->univ }}</td>
                <td @if (sizeof($k->souvenir) != 0) rowspan="{{ sizeof($k->souvenir) }}" @endif>
                    {{ $k->penerima }}
                </td>
                <td @if (sizeof($k->souvenir) != 0) rowspan="{{ sizeof($k->souvenir) }}" @endif>
                    {{ $k->alamat }}
                </td>
                <td @if (sizeof($k->souvenir) != 0) rowspan="{{ sizeof($k->souvenir) }}" @endif>
                    {{ $k->no }}</td>
                <td @if (sizeof($k->souvenir) != 0) rowspan="{{ sizeof($k->souvenir) }}" @endif>
                    {{ $k->souv_total()['total_harga'] }}</td>
                <td @if (sizeof($k->souvenir) != 0) rowspan="{{ sizeof($k->souvenir) }}" @endif>
                    {{ $k->souv_total()['total_berat'] }}</td>
                <td @if (sizeof($k->souvenir) != 0) rowspan="{{ sizeof($k->souvenir) }}" @endif>
                    {{ $k->total_ongkir }}
                </td>
                <td @if (sizeof($k->souvenir) != 0) rowspan="{{ sizeof($k->souvenir) }}" @endif>
                    <a href="{{ url('storage') . '/' . $k->bukti_ongkir }}">{{ url('storage') . '/' . $k->bukti_ongkir }}</a></td>
                <td @if (sizeof($k->souvenir) != 0) rowspan="{{ sizeof($k->souvenir) }}" @endif>
                    <a href="{{ url('storage') . '/' . $k->invoice_url }}">{{ url('storage') . '/' . $k->invoice_url }}</a></td>
                @if (sizeof($k->souvenir) != 0)
                    <td>
                        1
                    </td>
                    <td>
                        {{ $k->souvenir[0]->nama }}
                    </td>
                    <td>
                        {{ $k->souvenir[0]->jumlah }}
                    </td>
                    <td>
                        {{ $k->souvenir[0]->catatan }}
                    </td>
                @else
                    <td>none</td>
                    <td>none</td>
                    <td>none</td>
                    <td>none</td>
                @endif
            </tr>
            @for ($i = 1; $i < sizeof($k->souvenir); $i++)
                <tr>
                    <td>
                        {{ $i + 1 }}
                    </td>
                    <td>
                        {{ $k->souvenir[$i]->nama }}
                    </td>
                    <td>
                        {{ $k->souvenir[$i]->jumlah }}
                    </td>
                    <td>
                        {{ $k->souvenir[$i]->catatan }}
                    </td>
                </tr>
            @endfor
        @endforeach
    </tbody>
</table>
