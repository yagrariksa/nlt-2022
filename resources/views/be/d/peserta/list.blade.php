@include('be.dump.head')
<a href="{{ route('peserta', [
    'mode' => 'add',
    'object' => 'peserta',
]) }}">tambah peserta</a>

@if (Session::has('success'))
    <span class="error">{{ Session::get('success') }}</span>
@endif

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
                <td class="row row--no-space row-center">
                    <a
                        href="{{ route('peserta', [
                            'mode' => 'edit',
                            'object' => 'peserta',
                            'uid' => $p->uid,
                        ]) }}">Edit</a>
                    <a href="#">View Full Identity</a>
                    <form class="no-space"
                        action="{{ route('peserta', [
                            'mode' => 'delete',
                            'object' => 'peserta',
                            'uid' => $p->uid,
                        ]) }}"
                        method="post">
                        @method('delete')
                        @csrf
                        @if ($p->jabatan != 'ketua')
                            <button type="submit">Delete</button>
                        @else
                            <button disabled="disabled">Delete</button>
                        @endif
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@include('be.dump.foot')
