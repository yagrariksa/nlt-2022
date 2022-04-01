@extends('template.client')

@section('title', 'Souvenir')
@section('seo-desc')
@section('seo-img')

@section('addclass', 'list-souvenir')

@section('content')
    <h4 class="mobile-title">Souvenir</h4>
    <div class="list-souvenir__title-div">
        <h1 class="list-souvenir__title">Souvenir</h1>
        <a href="{{ route('souvenir', [
            'mode' => 'list',
            'object' => 'kantong',
        ]) }}"
            class="button btn-primary">LIST KERANJANG <img src="{{ url('assets/img/white-arrow.svg') }}"></a>
    </div>
    <div class="list-souvenir__search-div">
        <input type="text" class="adm-dashboard__input-search" id="souvenir-search" placeholder="Cari barang" style="">
    </div>

    <div class="form-group form-group--select-new list-souvenir__etalase--sm">
        <select name="list-souvenir__etalase" id="list-souvenir__etalase">
            <option value="default">
                Pilih Etalase</option>
            <option
                value="{{ route('souvenir', [
                    'mode' => 'list',
                    'object' => 'katalog',
                ]) }}">
                Semua Barang</option>
            @foreach ($kategori as $k)
                <option
                    value="{{ route('souvenir', [
                        'mode' => 'list',
                        'object' => 'katalog',
                        'kid' => $k->kat_id,
                    ]) }}">
                    {{ $k->nama }}</option>
            @endforeach
        </select>
    </div>

    <div class="list-souvenir__content">
        <div class="list-souvenir__left">
            <h2 class="list-souvenir__etalase-title">Etalase</h2>
            <div class="list-souvenir__etalase">
                <a href="{{ route('souvenir', [
                    'mode' => 'list',
                    'object' => 'katalog',
                ]) }}"
                    class="h5 list-souvenir__etalase-btn active">Semua Barang</a>
                @foreach ($kategori as $k)
                    <a href="{{ route('souvenir', [
                        'mode' => 'list',
                        'object' => 'katalog',
                        'kid' => $k->kat_id,
                    ]) }}"
                        class="h5 list-souvenir__etalase-btn">{{ $k->nama }}</a>
                @endforeach
            </div>
        </div>

        <div class="list-souvenir__right">
            <div class="list-souvenir__cards">
                @foreach ($barang as $kategori)
                    @if (sizeof($kategori->barang) > 0 || sizeof($kategori->child()) > 0)
                        {{-- <div class="list-souvenir__kategori" id="{{ $k->nama }}"> --}}
                        {{-- <h2 class="kategori__title">{{ $kategori->nama }}</h2> --}}
                        @foreach ($kategori->barang as $b)
                            <div class="list-souvenir__card"
                                onclick="window.location.replace('{{ route('souvenir', ['mode' => 'detail', 'object' => 'katalog', 's_id' => $b->bar_id]) }}')">
                                <img src="{{ sizeof($b->gambar) != 0 ? url('storage') . '/' . $b->gambar[0]->url : '' }}"
                                    alt="{{ $b->nama }}" class="list-souvenir__card--img">
                                <div class="list-souvenir__card--white">
                                    <div class="list-souvenir__card--badge">
                                        <h6 class="badge badge--parent">{{ $b->kategori->nama }}</h6>
                                    </div>
                                    <h4 class="list-souvenir__card--title">{{ $b->nama }}</h4>
                                    <p class="list-souvenir__card--harga">Rp{{ $b->harga }}</p>
                                </div>
                            </div>
                        @endforeach
                        @if (sizeof($kategori->child()) > 0)
                            @foreach ($kategori->child() as $c)
                                @foreach ($c->barang as $b)
                                    <div class="list-souvenir__card"
                                        onclick="window.location.replace('{{ route('souvenir', ['mode' => 'detail', 'object' => 'katalog', 's_id' => $b->bar_id]) }}')">
                                        <img src="{{ sizeof($b->gambar) != 0 ? url('storage') . '/' . $b->gambar[0]->url : '' }}"
                                            alt="{{ $b->nama }}" class="list-souvenir__card--img">
                                        <div class="list-souvenir__card--white">
                                            <div class="list-souvenir__card--badge">
                                                <h6 class="badge badge--parent">{{ $b->kategori->parent()->nama }}
                                                </h6>
                                                <h6 class="badge badge--child">{{ $b->kategori->nama }}</h6>
                                            </div>
                                            <h4 class="list-souvenir__card--title">{{ $b->nama }}</h4>
                                            <p class="list-souvenir__card--harga">Rp{{ $b->harga }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            @endforeach
                        @endif
                        {{-- </div> --}}
                    @endif
                @endforeach
            </div>

        </div>
    </div>
@endsection

@section('other')
    {{-- it can be modal, etc. --}}

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        // search 
        let data = document.querySelectorAll('.list-souvenir__card')
        let noItem = document.querySelector('.list-souvenir__no-item')

        document.querySelector('#souvenir-search').addEventListener('input', (xx) => {
            let value = xx.target.value
            let count = data.length
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

        // 'highlight' etalase btn
        let souvenirLocPage = window.location.href;
        let btns = $('.list-souvenir__etalase-btn');
        btns.map(x => {
            btns[x].classList.remove('active')
            if (btns[x].href == souvenirLocPage) {
                btns[x].classList.add('active')
                console.log('ok nic');
            }
        })

        $(function() {
            $(".list-souvenir__etalase--sm").click(() => {
                // console.log($("#list-souvenir__etalase")[0].value);
                location.href = $("#list-souvenir__etalase")[0].value;
            })

            $(".list-souvenir__etalase--sm option").map(x => {
                if ($(".list-souvenir__etalase--sm option")[x].value == location.href) {
                    $(".list-souvenir__etalase--sm option")[x].setAttribute('selected', 'true')
                }
            })
        })
    </script>
@endsection
