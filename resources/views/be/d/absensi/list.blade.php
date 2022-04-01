@extends('be.dump.temp')

@section('content')
    list absen
    @foreach (Auth::user()->peserta as $peserta)
        <h2>{{ $peserta->nama }}</h2>
        {{ $peserta->absen }}
        <table>
            <thead>
                <tr>
                    <th>no</th>
                    <th>sesi absen</th>
                    <th>keterangan</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $day = 1;
                    $session = 1;
                @endphp
                @foreach ($jadwal as $j)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>Day {{ $day }}, Session {{ $session }}</td>
                        <td>
                            @switch($peserta->sudahAbsen($j[0], $j[1]))
                                @case('sudah-absen')
                                    <span style="background-color: greenyellow">done</span>
                                @break

                                @case('absen-sekarang')
                                    <span style="background-color: aquamarine">now</span>
                                @break

                                @case('belum-saatnya-absen')
                                    <span style="background-color: beige">not yet</span>
                                @break

                                @case('tidak-absen')
                                    <span style="background-color: red">hahaha</span>
                                @break

                                @default
                            @endswitch
                        </td>
                    </tr>
                    @php
                        if ($session == 2) {
                            $day++;
                            $session = 1;
                        } else {
                            $session++;
                        }
                    @endphp
                @endforeach
            </tbody>
        </table>
    @endforeach
@endsection
