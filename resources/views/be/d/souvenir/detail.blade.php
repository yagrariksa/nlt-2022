@extends('be.dump.temp')

@section('content')
    <div class="" id="souvenir" style="display: flex; flex-direction: column; gap: 1rem">
        <span id="souv-nama">{{ $b->nama }}</span>
        <span id="souv-desc">{{ $b->desc }}</span>
        <img src="{{ sizeof($b->gambar) != 0 ? url('storage') . '/' . $b->gambar[0]->url : '' }}" alt="{{ $b->nama }}"
            style="width: 20rem">
        <span id="souv-berat">{{ $b->berat }}</span>
        <span id="souv-harga">HARGA : {{ $b->harga }}</span>
        <a href="{{ route('souvenir', ['mode' => 'add', 'object' => 'katalog', 's_id' => $b->bar_id]) }}">Tambahkan ke
            Kantong</a>
    </div>

    <form action="{{ route('souvenir', [
        'mode' => 'add-new-item',
    ]) }}" method="post">
        @csrf
        <input type="hidden" name="item_name" id="item_name" value="{{$b->nama}}">
        <input type="hidden" name="item_id" id="item_id" value="{{$b->bar_id}}">
        <input type="hidden" name="harga" id="harga" value="{{$b->harga}}">
        <input type="hidden" name="berat_gram" id="berat_gram" value="{{$b->berat}}">
        <h3>Form pemesanan</h3>
        <span>pilih kantong</span>
        @if (sizeof(Auth::user()->kantong) == 0)
            <div class="" style="margin-left: 1rem; padding: 1rem; border: 1px solid red;">
                <span>anda belum memiliki kantong</span>
                <a
                    href="{{ route('souvenir', [
                        'mode' => 'add',
                        'object' => 'kantong',
                        'redirect' => 'true',
                    ]) }}">buat
                    sekarang</a>
            </div>
        @else
            <select name="kantong" id="">
                <option value="" selected disabled>--pilih kantong--</option>
                @foreach (Auth::user()->kantong as $p)
                    <option value="{{ $p->id }}">{{ $p->nama }}</option>
                @endforeach
            </select>
            <a
                href="{{ route('souvenir', [
                    'mode' => 'add',
                    'object' => 'kantong',
                    'redirect' => 'true',
                ]) }}">tambah
                kantong</a>
        @endif
        <span>jumlah item</span>
        <input type="number" name="jumlah" id="">
        <span>keterangan tambahan</span>
        <textarea name="catatan" id="" cols="30" rows="10"></textarea>
        <button type="submit">Pesan</button>
    </form>

    <script>
    </script>
@endsection
