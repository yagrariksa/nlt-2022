@extends('be.dump.temp')

@section('content')
    <input type="text" id="admin__absen-search">
    <table>
        <thead>
            <tr>
                <th>no</th>
                <th>nama</th>
                <th>univ</th>
                <th>day 1, s1</th>
                <th>day 1, s2</th>
                <th>day 2, s1</th>
                <th>day 2, s2</th>
                <th>day 3, s1</th>
                <th>day 3, s2</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($peserta as $p)
                <tr class="admin__absen-data">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $p->nama }}</td>
                    <td>{{ $p->univ->univ }}</td>
                    @foreach ($jadwal as $j)
                        <td>
                            @switch($p->sudahAbsen($j[0], $j[1]))
                                @case('sudah-absen')
                                    <a style="background-color: greenyellow" href="#"
                                        onclick="window.open('{{ url('storage') . '/' . $p->absenImage($j[0], $j[1]) }}')">Sudah
                                        Absen</a>
                                @break

                                @case('absen-sekarang')
                                    <span style="background-color: aquamarine">Sedang Aktif</span>
                                @break

                                @case('belum-saatnya-absen')
                                    <span style="background-color: beige">Not Yet</span>
                                @break

                                @case('tidak-absen')
                                    <span style="background-color: red">Tidak Absen</span>
                                @break

                                @default
                            @endswitch
                        </td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>

    <script>
        var data = document.querySelectorAll('.admin__absen-data')

        document.querySelector('#admin__absen-search').addEventListener('input', (e) => {
            var value = e.target.value

            data.forEach(e => {
                e.style.display = 'none'
            });

            if (value == null) {
                data.forEach(e => {
                    e.style.display = 'table-row'
                })
            } else {
                data.forEach(e => {
                    if (e.innerText.toLowerCase().includes(value.toLowerCase())) {
                        e.style.display = 'table-row'
                    }
                })
            }
        })
    </script>
@endsection
