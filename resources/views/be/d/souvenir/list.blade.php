@extends('be.dump.temp')

@section('content')
    <a href="{{ route('souvenir', [
        'mode' => 'list',
        'object' => 'kantong',
    ]) }}">lihat list
        kantong</a>
    <div id="template" class="card hide">
        <div class="card-title"></div>
        <div class="card-desc"></div>
    </div>
    <input type="text" placeholder="search" id="suov__list__search">
    <ul>
        <li>
            <a
                href="{{ route('souvenir', [
                    'mode' => 'list',
                    'object' => 'katalog',
                ]) }}">Semua
                Barang</a>
        </li>
        @foreach ($kategori as $k)
            <li>
                <a
                    href="{{ route('souvenir', [
                        'mode' => 'list',
                        'object' => 'katalog',
                        'kid' => $k->kat_id,
                    ]) }}">{{ $k->nama }}</a>
            </li>
        @endforeach
    </ul>

    <h3 id="souv__no-item" style="display: none">TIDAK ADA BARANG YANG DICARI</h3>

    @foreach ($barang as $kategori)
        @if (sizeof($kategori->barang) > 0 || sizeof($kategori->child()) > 0)
            <h3>{{ $kategori->nama }}</h3>
        @endif
        <div id="souvenir__list">
            @foreach ($kategori->barang as $b)
                <div class="card souv__data-barang"
                    onclick="window.location.replace('{{ route('souvenir', ['mode' => 'detail', 'object' => 'katalog', 's_id' => $b->bar_id]) }}')">
                    <img src="{{ sizeof($b->gambar) != 0 ? url('storage') . '/' . $b->gambar[0]->url : '' }}"
                        alt="{{ $b->nama }}" style="width: 10rem">
                    <div class="card-title">{{ $b->nama }}</div>
                    <div class="card-title" style="padding: 1px; border: 1px solid blue; width: fit-content">
                        {{ $b->kategori->nama }}</div>
                    <div class="card-desc">{{ $b->harga }}</div>

                </div>
            @endforeach
            @if (sizeof($kategori->child()) > 0)
                @foreach ($kategori->child() as $c)
                    @foreach ($c->barang as $b)
                        <div class="card souv__data-barang"
                            onclick="window.location.replace('{{ route('souvenir', ['mode' => 'detail', 'object' => 'katalog', 's_id' => $b->bar_id]) }}')">
                            <img src="{{ sizeof($b->gambar) != 0 ? url('storage') . '/' . $b->gambar[0]->url : '' }}"
                                alt="{{ $b->nama }}" style="width: 10rem">
                            <div class="card-title">{{ $b->nama }}</div>
                            <div class="card-title" style="padding: 1px; border: 1px solid blue; width: fit-content">
                                {{ $b->kategori->parent()->nama }} &&& {{ $b->kategori->nama }} </div>
                            <div class="card-desc">{{ $b->harga }}</div>

                        </div>
                    @endforeach
                @endforeach
            @endif

        </div>
    @endforeach



    <script>
        //    create script for search-field
        var data = document.querySelectorAll('.souv__data-barang')
        var noItem = document.querySelector('#souv__no-item')

        document.querySelector('#suov__list__search').addEventListener('input', (xx) => {
            var value = xx.target.value
            var count = data.length
            data.forEach(e => {
                e.parentElement.previousElementSibling.style.display = 'none'
                e.style.display = 'none'
            });

            if (value == null) {
                data.forEach(e => {
                    e.parentElement.previousElementSibling.style.display = 'block'
                    e.style.display = 'flex'
                    count--

                })
            } else {
                data.forEach(e => {
                    if (e.innerText.toLowerCase().includes(value.toLowerCase())) {
                        e.parentElement.previousElementSibling.style.display = 'block'
                        e.style.display = 'flex'
                        count--
                    }
                })
            }
            if (data.length == count) {
                noItem.style.display = 'block'
            } else {
                noItem.style.display = 'none'
            }
        })
    </script>
@endsection
