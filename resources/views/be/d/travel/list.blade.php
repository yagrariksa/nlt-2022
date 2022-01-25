@include('be.dump.head')
<a href="{{route('peserta', [
    'mode' => 'add',
    'object' => 'travel'
])}}">tambah travel plan</a>

<h4>kedatangan</h4>
<table>
    <thead>
        <tr>
            <th>no</th>
            <th>nama</th>
            <th>kedatangan di</th>
            <th>transport</th>
            <th>tanggal</th>
            <th>bantuan panitia</th>
            <th>aksi</th>
        </tr>
    </thead>
    <tbody>
        @php
            $counter = 1;
        @endphp
        @foreach (Auth::user()->peserta as $p)
            @if ($p->datang)
                <tr>
                    <td>{{$counter}}</td>
                    @php
                        $counter++;
                    @endphp
                    <td>{{$p->nama}}</td>
                    <td>{{$p->datang->lokasi}}</td>
                    <td>{{$p->datang->transportasi}}</td>
                    <td>{{$p->datang->tanggal}}</td>
                    <td>{{$p->datang->bantuan ? 'ya' : 'tidak'}}</td>
                    <td>
                        <a href="#">Edit</a>
                        <a href="#">Hapus</a>
                    </td>
                </tr>
            @endif
        @endforeach
    </tbody>
</table>

<h4>kepergian</h4>
@include('be.dump.foot')