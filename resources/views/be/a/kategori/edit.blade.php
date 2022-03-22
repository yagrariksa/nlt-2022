@extends('be.dump.temp')

@section('content')
    <form
        action="{{ route('a.souvenir', [
            'mode' => 'edit-my-kategori',
            'key' => $data->kat_id,
        ]) }}"
        method="post">
        @csrf
        <input type="text" name="nama" placeholder="nama kategori" value="{{ $data->nama }}">
        <select name="parent" id="">
            <option value="" @if (!$data->parent_id) selected @endif disabled>--pilih parent--</option>
            @foreach ($k as $item)
                @if ($item->id != $data->id)
                    <option @if ($data->parent_id == $item->id) selected @endif value="{{ $item->id }}">
                        {{ $item->nama }}
                    </option>
                @endif
            @endforeach
        </select>
        <button type="submit">EDIT</button>
    </form>
@endsection
