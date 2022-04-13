@extends('be.dump.temp')

@section('content')
    <div class="" style="display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 1rem; margin: 2rem 0">
        @foreach (Auth::user()->sertif as $img)
            <div class="" style="display: flex; flex-direction: column">
                <img src="{{ url('storage') . '/' . $img->filename }}" alt="{{ $img->filename }}" style="width: 100%">
                <button style="width: 100%"
                    onclick="window.open('{{ route('sertif', [ 'filename' => $img->filename]) }}')">DOWNLOAD</button>
            </div>
        @endforeach
    </div>
@endsection
