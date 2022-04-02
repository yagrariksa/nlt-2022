@extends('be.dump.temp')

@section('content')
    @dump($errors)
    {{ $user->univ }}
    @if ($absen)
        <form action="{{ route('absensi') }}" method="post" enctype="multipart/form-data">
            <h1>{{ $day }}</h1>
            @csrf
            <input type="hidden" name="uid" value="{{ $user->uid }}">
            <input type="file" name="bukti" id="">
            <button type="submit">SUBMIT</button>
        </form>
    @else
        <h1>Bukan Jadwal Absen</h1>
    @endif
@endsection
