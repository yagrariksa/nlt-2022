<table border="1">

    <tr>
        <th>No</th>
        <th>nama</th>
        <th>email</th>
        <th>line</th>
        <th>jabatan</th>
        <th>handphone</th>
        <th>foto_url</th>

    </tr>

    @foreach ($data as $p)
        <tr>
            <td> {{ $loop->iteration }} </td>
            <td>{{ $p->nama }}</td>
            <td>{{ $p->email }}</td>
            <td>{{ $p->line }}</td>
            <td>{{ $p->jabatan }}</td>
            <td>{{ $p->handphone }}</td>
            <td><a href="{{ url('storage') . '/' . $p->foto_url }}">{{ url('storage') . '/' . $p->foto_url }}</a></td>
        </tr>
    @endforeach
</table>
