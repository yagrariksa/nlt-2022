<table class="adm-table__table adm-table__table-head adm-absensi__table" id="tableAdmListAbsensi">
    <thead>
        <tr>
            <th>No.</th>
            <th>Nama Peserta</th>
            <th>Universitas</th>
            <th>Day 1 - Sesi 1<br>08.00-08.15</th>
            <th>Day 1 - Sesi 2<br>12.30-12.45</th>
            <th>Day 2 - Sesi 1<br>08.00-08.15</th>
            <th>Day 2 - Sesi 2<br>12.30-12.45</th>
            <th>Day 3 - Sesi 1<br>08.00-08.15</th>
            <th>Day 3 - Sesi 2<br>12.30-12.45</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($peserta as $p)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $p->nama }}</td>
                <td>{{ $p->univ->univ }}</td>

                @foreach ($jadwal as $j)
                    <td>
                        @switch($p->sudahAbsen($j[0], $j[1]))
                            @case('sudah-absen')
                                <a href="{{ url('storage') . '/' . $p->absenImage($j[0], $j[1]) }}">Sudah Absen</a>
                            @break

                            @case('absen-sekarang')
                                Sedang Aktif
                            @break

                            @case('belum-saatnya-absen')
                                Belum Dibuka
                            @break

                            @case('tidak-absen')
                                Belum Absen
                            @break

                            @default
                        @endswitch
                    </td>
                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>
