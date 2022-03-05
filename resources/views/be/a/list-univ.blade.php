@include('be.dump.head')
list univ
<table>
    <thead>
        <tr>
            <th>no</th>
            <th>univ</th>
            <th>aksi</th>
        </tr>
    </thead>
    <tbody>
        @php
            $loopir = $data->perPage() * $data->currentPage() - ($data->perPage() - 1);
        @endphp
        @foreach ($data as $univ)
            <tr>
                <td>{{ $loopir }}</td>
                @php
                    $loopir++;
                @endphp
                <td>{{ $univ->email }}</td>
                <td>
                    <a
                        href="{{ route('a.peserta', [
                            'object' => 'peserta',
                            'univ' => $univ->email,
                        ]) }}">peserta</a>
                </td>
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
                        'object' => 'univ',
                        'page' => 1,
                    ]) }}">First
                    Page</a></li>
        @endif
        @for ($i = 2; $i < $data->currentPage(); $i++)
            <li><a
                    href="{{ route('a.peserta', [
                        'object' => 'univ',
                        'page' => $i,
                    ]) }}">
                    Page {{ $i }}</a></li>
        @endfor
        @for ($i = $data->currentPage() + 1; $i < $data->lastPage(); $i++)
            <li><a
                    href="{{ route('a.peserta', [
                        'object' => 'univ',
                        'page' => $i,
                    ]) }}">Page
                    {{ $i }}</a></li>
        @endfor
        @if ($data->currentPage() != $data->lastPage())
            <li><a
                    href="{{ route('a.peserta', [
                        'object' => 'univ',
                        'page' => $data->lastPage(),
                    ]) }}">Last
                    Page</a></li>
        @endif
        <li></li>
    </ul>
</span>
<span>paginator laravel page : <a
        href="https://laravel.com/docs/8.x/pagination#paginator-instance-methods">https://laravel.com/docs/8.x/pagination#paginator-instance-methods</a></span>
@dump($data)
{{ $data->links() }}
@include('be.dump.foot')
