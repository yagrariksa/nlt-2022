@extends('template.client')

@section('title', 'Detail Souvenir - Namanya')
@section('seo-desc')
@section('seo-img')

@section('addclass', 'detail-souvenir')

@section('content')
    <div class="detail-souvenir__left">
        <div class="detail-souvenir__title-section">
            <h3 class="detail-souvenir__section-title">Souvenir</h3>
            <h1 class="detail-souvenir__title">T-Shirt</h1>
            <h3 class="detail-souvenir__harga">Rp50.000,00</h3>
        </div>
        <div class="detail-souvenir__desc-section">
            <h3 class="detail-souvenir__section-title">Deskripsi</h3>
            <h4 class="detail-souvenir__desc">Materials : Black cotton 30's with plastisol ink screen print. <br><br> S :
                chest : 50 - length : 71 - sleeve : 20 <br> M : chest : 53 - length : 73 - sleeve : 21 <br> L : chest : 55 -
                length : 75 - sleeve : 22 <br> XL : chest : 58 - length : 78 - sleeve : 23 <br> XXL : chest : 61 - length :
                81 - sleeve : 24 <br> XXXL : chest : 64 - length : 84 - sleeve : 25 <br> <br> Warna yang terlihat pada
                gambar mungkin tidak 100% sama dengan produk yang sebenarnya, disebabkan faktor cahaya pada pengambilan
                gambar, atau kondisi gadget yang digunakan untuk melihat gambar.
            </h4>
        </div>
        <hr>
        <form class="detail-souvenir__form-section">
            <h3 class="detail-souvenir__section-title">Form Pemesanan</h3>
            <x-form.select-options id="kantong" label="Pilih Keranjang Alamat" options='kantong 1, kantong 2, kantong 3'
                class="" value="{{ Session::get('kantong') ? Session::get('kantong') : '' }}"
                value="{{ old('kantong') ? old('kantong') : '' }}"
                helper="*Jika keranjang tidak ada pada pilihan diatas, maka buat keranjang anda" helperUrl="#"
                helperLink="disini" />
            <x-form.input-text id="item" label="Jumlah Item" value="{{ old('item') ? old('item') : '' }}" />
            <x-form.text-area id="keterangan" label="Keterangan (ukuran, warna, atau catatan lain)"
                value="{{ old('keterangan') ? old('keterangan') : '' }}" />
            <div class="detail-souvenir__total">
                <h3 class="detail-souvenir__total--left">Total</h3>
                <h3 class="detail-souvenir__total--right">Rp50.000,00</h3>
            </div>
            <button class="btn-primary detail-souvenir__submit">PESAN</button>
        </form>
    </div>
    <div class="detail-souvenir__right">
        <div class="detail-souvenir__images">
            <img src="{{ url('assets/img/souvenir/nama item-1.jpg') }}" alt="Item 1" class="detail-souvenir__img">
            <img src="{{ url('assets/img/souvenir/nama item-1.jpg') }}" alt="Item 2" class="detail-souvenir__img">
            <img src="{{ url('assets/img/souvenir/nama item-1.jpg') }}" alt="Item 3" class="detail-souvenir__img">
        </div>
    </div>
@endsection

@section('other')
    {{-- it can be modal, etc. --}}
@endsection
