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
    <div id="souvenir__list">
        @foreach ($barang as $b)
            <div class="card"
                onclick="window.location.replace('{{ route('souvenir', ['mode' => 'detail', 'object' => 'katalog', 's_id' => $b->bar_id]) }}')">
                <img src="{{ sizeof($b->gambar) != 0 ? url('storage') . '/' . $b->gambar[0]->url : '' }}"
                    alt="{{ $b->nama }}" style="width: 10rem">
                <div class="card-title">{{ $b->nama }}</div>
                <div class="card-desc">{{ $b->harga }}</div>
            </div>
        @endforeach
    </div>



    <script>
        // var url = "{{ url('/assets/json/souvenir.json') }}";
        // const content = document.querySelector('#souvenir__list');
        // const template = document.querySelector('#template');
        // const getData = () => {
        //     fetch(url)
        //         .then(response => response.json())
        //         .then(data => {
        //             console.log(data);
        //             assignData(data);
        //         })
        // }
        // const assignData = (data) => {
        //     console.log(data.length)
        //     data.forEach(e => {
        //         let a = template.cloneNode(true);
        //         a.classList.remove('hide');
        //         a.removeAttribute('id');
        //         a.querySelector('.card-title').textContent = e.nama
        //         a.querySelector('.card-desc').textContent = e.desc
        //         console.log(a)
        //         content.appendChild(a)
        //         a.addEventListener('click', () => {
        //             let url = "{{ route('souvenir', ['mode' => 'detail']) }}" +
        //                 "&object=katalog&s_id=" + e.uid
        //             console.log(url)
        //             window.location.replace(url)
        //         })
        //     });
        // }

        // getData()
    </script>
@endsection
