@include('be.dump.head')
list peserta
<table>
    <thead>
        <tr>
            <th>no</th>
            <th>nama</th>
            <th>univ</th>
            <th>jabatan</th>
            <th>aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $p)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $p->nama }}</td>
                <td>{{ $p->univ->email }}</td>
                <td>{{ $p->jabatan }}</td>
                <td><a href="#">View Details</a></td>
            </tr>
        @endforeach
    </tbody>
</table>

<span>current page : {{ $data->currentPage() }}</span>
<span>showing {{ $data->perPage() * $data->currentPage() - ($data->perPage() - 1) }} to
    {{ $data->perPage() * $data->currentPage() }} of {{ $data->total() }} result</span>
<span>Links
    <ul>
        @if ($data->currentPage() != 1)
            <li><a
                    href="{{ route('a.peserta', [
                        'object' => 'peserta',
                        'page' => 1,
                    ]) }}">First
                    Page</a></li>
        @endif
        @for ($i = 2; $i < $data->currentPage(); $i++)
            <li><a
                    href="{{ route('a.peserta', [
                        'object' => 'peserta',
                        'page' => $i,
                    ]) }}">
                    Page {{ $i }}</a></li>
        @endfor
        @for ($i = $data->currentPage() + 1; $i < $data->lastPage(); $i++)
            <li><a
                    href="{{ route('a.peserta', [
                        'object' => 'peserta',
                        'page' => $i,
                    ]) }}">Page
                    {{ $i }}</a></li>
        @endfor
        @if ($data->currentPage() != $data->lastPage())
            <li><a
                    href="{{ route('a.peserta', [
                        'object' => 'peserta',
                        'page' => $data->lastPage(),
                    ]) }}">Last
                    Page</a></li>
        @endif
        <li></li>
    </ul>
</span>
@dump($data)
@include('be.dump.foot')
