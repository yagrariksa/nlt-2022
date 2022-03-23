@extends('template.client')

@section('title', 'Detail Souvenir')
@section('seo-desc')
@section('seo-img')

    {{-- @section('addclass', 'detail-souvenir') --}}

@section('content')
    <div class="detail-souvenir-sm">
        <h4 class="mobile-title">Detail Barang</h4>
        <div class="detail-souvenir-sm__images">
            <img src="{{ url('assets/img/souvenir/nama item-1.jpg') }}" alt="Item 1" class="detail-souvenir__img">
            <img src="{{ url('assets/img/souvenir/nama item-1.jpg') }}" alt="Item 2" class="detail-souvenir__img">
            <img src="{{ url('assets/img/souvenir/nama item-1.jpg') }}" alt="Item 3" class="detail-souvenir__img">
        </div>
    </div>

    <div class="detail-souvenir">
        <div class="detail-souvenir__left">
            <div class="detail-souvenir__title-section">
                <h1 class="detail-souvenir__title"></h1>
                <h3 class="detail-souvenir__harga"></h3>
            </div>
            <div class="detail-souvenir__desc-section">
                <h3 class="detail-souvenir__section-title">Deskripsi</h3>
                <h4 class="detail-souvenir__desc"></h4>
            </div>
            <hr>
            <form action="{{ route('souvenir', [
                'mode' => 'add-new-item',
            ]) }}"
                method="post" class="detail-souvenir__form-section">
                @csrf
                <h1 class="detail-souvenir__section-title">Form Pemesanan</h1>
                <input type="hidden" name="item_name" id="item_name">
                <input type="hidden" name="item_id" id="item_id">
                <input type="hidden" name="harga" id="harga">
                <input type="hidden" name="berat_gram" id="berat_gram">
                {{-- special select-option --}}
                <div class="form-group form-group--select">
                    <select name="kantong" id="kantong">
                        <option value=""></option>
                        @foreach (Auth::user()->kantong as $p)
                            <option value="{{ $p->id }}">
                                {{ $p->nama }}
                            </option>
                        @endforeach
                    </select>
                    <label for="select" class="form-group__control-label">Pilih Keranjang Alamat</label>
                    <i class="form-group__bar"></i>
                    <h6 class="form-help">
                        *Jika keranjang tidak ada pada pilihan diatas, maka buat keranjang anda
                        <a
                            href="{{ route('souvenir', [
                                'mode' => 'add',
                                'object' => 'kantong',
                                'redirect' => 'true',
                            ]) }}">disini</a>
                    </h6>
                </div>

                <x-form.input-text id="jumlah" label="Jumlah Item" value="{{ old('jumlah') ? old('jumlah') : '' }}" />
                <x-form.text-area id="catatan" label="Keterangan (ukuran, warna, atau catatan lain)" />
                <div class="detail-souvenir__total">
                    <h3 class="detail-souvenir__total--left">Total</h3>
                    <h3 class="detail-souvenir__total--right">Rp0</h3>
                </div>
                <button type="submit" class="btn-primary detail-souvenir__submit">PESAN</button>
            </form>
        </div>
        <div class="detail-souvenir__right">
            <div class="detail-souvenir__images">
                {{-- <img src="{{ url('assets/img/souvenir/nama item-1.jpg') }}" alt="Item 1" class="detail-souvenir__img">
                <img src="{{ url('assets/img/souvenir/nama item-1.jpg') }}" alt="Item 2" class="detail-souvenir__img">
                <img src="{{ url('assets/img/souvenir/nama item-1.jpg') }}" alt="Item 3" class="detail-souvenir__img"> --}}
            </div>
        </div>
    </div>
@endsection

@section('other')
    {{-- it can be modal, etc. --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script>
        function getParameterByName(name, url = window.location.href) {
            name = name.replace(/[\[\]]/g, '\\$&');
            var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
                results = regex.exec(url);
            if (!results) return null;
            if (!results[2]) return '';
            return decodeURIComponent(results[2].replace(/\+/g, ' '));
        }

        const souvenirId = getParameterByName('s_id');
        var dodata;
        var url = "{{ url('/assets/json/souvenir.json') }}";

        const populateData = () => {
            $('.detail-souvenir__title')[0].textContent = this.dodata.nama;
            $('.detail-souvenir__desc')[0].textContent = this.dodata.desc;
            $('.detail-souvenir__harga')[0].textContent = 'Rp' + this.dodata.harga;
            $('#item_id')[0].value = this.dodata.uid;
            $('#item_name')[0].value = this.dodata.nama;
            $('#harga')[0].value = this.dodata.harga;
            $('#berat_gram')[0].value = this.dodata.berat;

            let imgLen = Object.keys(this.dodata.img).length;
            for (let i = 0; i < imgLen; i++) {
                let imgElm = document.createElement('img');
                imgElm.setAttribute('class', 'detail-souvenir__img');
                imgElm.setAttribute('src', this.dodata.img[i]);
                $('.detail-souvenir__images')[0].append(imgElm);
                console.log($('.detail-souvenir-sm__images .slick-track')[0].append(imgElm));
                console.log($('.detail-souvenir__images')[0].append(imgElm));
            }
        }

        const getData = () => {
            fetch(url)
                .then(response => response.json())
                .then(data => {
                    this.dodata = data.filter((e) => {
                        return e.uid == souvenirId
                    })[0]
                    populateData();
                })
        }
        getData()

        // ngisi total
        $('#jumlah').change(() => {
            $('.detail-souvenir__total--right')[0].textContent = 'Rp' + this.dodata.harga * $('#jumlah')[0].value
        })

        // slider
        $('.detail-souvenir-sm__images').slick({
            slidesToShow: 1,
            dots: true,
            prevArrow: '',
            nextArrow: '',
        });

        // submit handling on mobile
        $('.detail-souvenir__submit').click(e => {
            if ((window.innerHeight + window.pageYOffset) <= $('body')[0].offsetHeight) {
                e.preventDefault();
                window.scrollTo(0, $('body')[0].offsetHeight);
            }
        })
    </script>
@endsection
