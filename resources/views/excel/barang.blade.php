<table border="1">
    <thead>
        <tr>
            <th>
                No.
            </th>
            <th>
                Barang
            </th>
            <th>
                Jumlah Terjual
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($b as $barang)
            <tr >
                <td>{{ $loop->iteration }}</td>
                <td >{{ $barang->nama }}</td>
                <td >{{ $barang->terbeli_count() }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
