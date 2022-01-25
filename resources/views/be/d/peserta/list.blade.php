@include('be.dump.head')
<a href="{{route('peserta', [
    'mode' => 'add',
    'object' => 'peserta'
])}}">tambah peserta</a>

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
                <td>{{$loop->iteration}}</td>
                <td>{{$p->nama}}</td>
                <td>{{$p->jabatan}}</td>
                <td class="row row--no-space row-center">
                    <a href="#">Edit</a>
                    <a href="#">View Full Identity</a>
                    <a href="#">Delete</a>
                </td>
                </tr>        
        @endforeach
    </tbody>
</table>
@include('be.dump.foot')