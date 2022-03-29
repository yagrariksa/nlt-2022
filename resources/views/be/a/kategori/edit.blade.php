@extends('be.dump.temp')

@section('content')
    <form
        action="{{ route('a.souvenir', [
            'mode' => 'edit-my-kategori',
            'key' => $data->kat_id,
        ]) }}"
        method="post">
        @csrf
        @if (!$data->parent_id)
            <h2>Edit Kategori</h2>
        @else
            <h2>Edit Sub-Kategori <span style="color: red">Dari {{ $data->parent()->nama }}</span>
            </h2>
        @endif
        <input type="text" name="nama" placeholder="nama kategori" value="{{ $data->nama }}">
        <input type="hidden" name="parent" value="{{ $data->parent_id ? $data->parent_id : '' }}">
        <button type="submit">EDIT</button>
    </form>
@endsection
