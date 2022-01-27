@include('be.dump.head')
<a href="{{ route('peserta', [
    'mode' => 'add',
    'object' => 'travel',
]) }}">tambah travel plan</a>

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
                    <td>{{ $counter }}</td>
                    @php
                        $counter++;
                    @endphp
                    <td>{{ $p->nama }}</td>
                    <td>{{ $p->datang->lokasi }}</td>
                    <td>{{ $p->datang->transportasi }}</td>
                    <td>{{ $p->datang->tanggal }}</td>
                    <td>{{ $p->datang->bantuan ? 'ya' : 'tidak' }}</td>
                    <td class="row row--no-space row-center">
                        <a href="{{route('peserta', [
                            'mode' => 'edit',
                            'object' => 'travel',
                            'uid' => $p->uid . '@' . 'KEDATANGAN'
                        ])}}">Edit</a>
                        <form class="no-space"
                            action="{{ route('peserta', [
                                'mode' => 'delete',
                                'object' => 'travel',
                                'uid' => $p->uid . '@' . 'KEDATANGAN',
                            ]) }}"
                            method="post">
                            @method('delete')
                            @csrf
                            <button type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endif
        @endforeach
    </tbody>
</table>

<h4>kepulangan</h4>
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
            @if ($p->pergi)
                <tr>
                    <td>{{ $counter }}</td>
                    @php
                        $counter++;
                    @endphp
                    <td>{{ $p->nama }}</td>
                    <td>{{ $p->pergi->lokasi }}</td>
                    <td>{{ $p->pergi->transportasi }}</td>
                    <td>{{ $p->pergi->tanggal }}</td>
                    <td>{{ $p->pergi->bantuan ? 'ya' : 'tidak' }}</td>
                    <td class="row row--no-space row-center">
                        <a href="{{route('peserta', [
                            'mode' => 'edit',
                            'object' => 'travel',
                            'uid' => $p->uid . '@' . 'KEPULANGAN'
                        ])}}">Edit</a>
                        <form class="no-space"
                            action="{{ route('peserta', [
                                'mode' => 'delete',
                                'object' => 'travel',
                                'uid' => $p->uid . '@' . 'KEPULANGAN',
                            ]) }}"
                            method="post">
                            @method('delete')
                            @csrf
                            <button type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endif
        @endforeach
    </tbody>
</table>
@include('be.dump.foot')
