@extends('template.client')

@section('title', 'Detail Souvenir')
@section('seo-desc')
@section('seo-img')

    {{-- @section('addclass', 'detail-souvenir') --}}

@section('content')
    <div class="detail-souvenir-sm">
        <h4 class="mobile-title">Detail Barang</h4>
        <div class="detail-souvenir-sm__images">
            <img src="{{ sizeof($b->gambar) != 0 ? url('storage') . '/' . $b->gambar[0]->url : '' }}"
                alt="{{ $b->nama }}">
        </div>
    </div>

    <div class="detail-souvenir">
        <div class="detail-souvenir__left">
            <div class="detail-souvenir__title-section">
                <h1 class="detail-souvenir__title">{{ $b->nama }}</h1>
                <h3 class="detail-souvenir__harga">{{ $b->harga }}</h3>
            </div>
            <div class="detail-souvenir__desc-section">
                <h3 class="detail-souvenir__section-title">Deskripsi</h3>
                <h4 class="detail-souvenir__desc">{{ $b->desc }}</h4>
            </div>
            <hr>
            <form action="{{ route('souvenir', [
                'mode' => 'add-new-item',
            ]) }}"
                method="post" class="detail-souvenir__form-section">
                @csrf
                <h1 class="detail-souvenir__section-title">Form Pemesanan</h1>
                <input type="hidden" name="item_name" id="item_name" value="{{ $b->nama }}">
                <input type="hidden" name="item_id" id="item_id" value="{{ $b->bar_id }}">
                <input type="hidden" name="harga" id="harga" value="{{ $b->harga }}">
                <input type="hidden" name="berat_gram" id="berat_gram" value="{{ $b->berat }}">
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
                    <label for="select" class="form-group__control-label">Pilih Keranjang</label>
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
                    @if ($errors->has('kantong'))
                        <h6 class="form-help">{{ $errors->first('kantong') }}</h6>
                    @endif
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
                <img src="{{ sizeof($b->gambar) != 0 ? url('storage') . '/' . $b->gambar[0]->url : '' }}"
                    alt="{{ $b->nama }}">
            </div>
        </div>
    </div>
@endsection

@section('other')
    {{-- it can be modal, etc. --}}
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script>
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
