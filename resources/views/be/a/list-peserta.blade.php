@include('be.dump.head')
list peserta
<table>
    <thead>
        <tr>
            <th>no</th>
            <th>nama</th>
            <th>jabatan</th>
            <th>aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $p)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $p->nama }}</td>
                <td>{{ $p->jabatan }}</td>
                <td>{{ $p->aksi }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@dump($data)
@include('be.dump.foot')
