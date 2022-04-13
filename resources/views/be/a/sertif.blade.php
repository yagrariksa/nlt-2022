@extends('be.dump.temp')

@section('content')
    <form action="{{ route('a.peserta', ['mode' => 'upload-sertif']) }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="email" value="{{ $univ->email }}">
        <input type="file" name="image[]" id="" multiple required>
        <button type="submit">SUBMIT</button>
    </form>
@endsection
