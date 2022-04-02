@extends('template.admin')

@section('title', 'Detail Pesanan Peserta')
@section('seo-desc')
@section('seo-img')

@section('addclass', 'detail-keranjang adm-detail-keranjang')

@section('content')
    <div class="detail-keranjang__title">
        <h1>Detail Pesanan</h1>
    </div>
    <div class="keranjang__card detail-keranjang__card">
        <div class="keranjang__card--left detail-keranjang__card--left">
            <h3 class="keranjang__card--title">{{ $k->nama }}</h3>
            <h4 class="keranjang__card--desc">{{ $k->penerima }} - {{ $k->no }}</h4>
            <h4 class="keranjang__card--desc">{{ $k->alamat }}</h4>
        </div>
        <div class="detail-keranjang__card--right">
            <div class="top">
                <h4 class="keranjang__card--berat">Total Berat : <span>{{ $k->souv_total()['total_berat'] }}
                        (kg/gram?)</span></h4>
                <h4 class="keranjang__card--ongkir">Ongkir : <span>Rp{{ $k->total_ongkir }}</span></h4>
                <h4 class="keranjang__card--total">Grand Total :
                    <span>Rp{{ $k->souv_total()['total_harga'] + $k->total_ongkir }}</span>
                </h4>
            </div>
            <div class="detail-keranjang__action">
                @if ($k->bukti_ongkir)
                    <a href="{{ url('storage') . '/' . $k->bukti_ongkir }}" alt="{{ $k->bukti_ongkir }}" target="_blank"
                        rel="noopener noreferrer"
                        class="button detail-keranjang__dialog-btn detail-keranjang__dialog-btn--lihat-ongkir">
                        Lihat Bukti Ongkir</a>
                @else
                    <a class="button detail-keranjang__dialog-btn detail-keranjang__dialog-btn--lihat-ongkir" disabled>
                        Lihat Bukti Ongkir</a>
                @endif
                @if ($k->invoice_url)
                    <a href="{{ url('storage') . '/' . $k->bukti_ongkir }}" alt="{{ $k->bukti_ongkir }}"
                        target="_blank" rel="noopener noreferrer"
                        class="button detail-keranjang__dialog-btn detail-keranjang__dialog-btn--lihat-pembayaran">
                        Lihat Bukti Pembayaran</a>
                @else
                    <a class="button detail-keranjang__dialog-btn detail-keranjang__dialog-btn--lihat-pembayaran" disabled>
                        Lihat Bukti Pembayaran</a>
                @endif
            </div>
        </div>
    </div>

    <div class="detail-keranjang__items">
        @foreach ($k->souvenir as $item)
            <div class="detail-keranjang__item">
                <div class="detail-keranjang__item--left">
                    <div class="detail-keranjang__item--line">
                        <h4 class="detail-keranjang__item--title">{{ $item->nama }}</h4>
                        <h4 class="detail-keranjang__item--harga">Rp{{ $item->harga }}</h4>
                    </div>
                    <div class="detail-keranjang__item--line">
                        <h4 class="detail-keranjang__item--label">Jumlah</h4>
                        <h4 class="detail-keranjang__item--jumlah">{{ $item->jumlah }}</h4>
                    </div>
                    <div class="detail-keranjang__item--line">
                        <h4 class="detail-keranjang__item--label">Keterangan</h4>
                        <h4 class="detail-keranjang__item--keterangan">{{ $item->catatan }}</h4>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

@section('other')
    @if ($k->bukti_ongkir)
        {{-- if tanggal sudah masa pembayaran --}}
        @if ($k->invoice_url)
            {{-- kalo udah bayar --}}
            <img src="{{ url('storage') . '/' . $k->invoice_url }}" alt="{{ $k->invoice_url }}"
                class="detail-keranjang-card__invoice">
            <div class="detail-keranjang-card__bg--invoice"></div>
        @else
            {{-- kalo belom bayar --}}
            <form class="content detail-keranjang-card detail-keranjang-card--bukti-bayar"
                action="{{ route('souvenir', [
                    'mode' => 'submit-invoice',
                    'kid' => $k->kid,
                ]) }}"
                method="post" enctype="multipart/form-data">
                <div class="detail-keranjang-card__left">
                    @csrf
                    <div class="detail-keranjang-card__left-top">
                        <h2>Upload Bukti Pembayaran</h2>
                        <h4 class="detail-keranjang-card__total-pembayaran">Total Pembayaran (termasuk ongkir) :
                            <span>Rp{{ $k->total_ongkir }}</span>
                        </h4>
                        <h4 class="detail-keranjang-card__rekening">Rekening Tujuan :
                            <span>BNI 0838455526 a/n Andiva Nurul Fitri</span>
                        </h4>
                        <x-form.input-img id="img" label="Bukti Pembayaran" />
                    </div>
                    <div class="detail-keranjang-card__left-bottom">
                        <h5 class="detail-keranjang-card__peringatan">
                            <span>PERINGATAN!</span><br>
                            Setelah anda mengupload bukti pembayaran, anda <span>tidak dapat</span> kembali mengedit
                            keranjang, barang yang dipesan, ongkir, serta alamat pengiriman anda.
                        </h5>
                        <div class="detail-keranjang-card__btns">
                            <button type="submit" class="btn-primary detail-keranjang-card__submit">SUBMIT BUKTI
                                PEMBAYARAN</button>
                            <a href="" class="detail-keranjang-card__cancel">Batalkan</a>
                        </div>
                    </div>
                </div>
                <div class="detail-keranjang-card__right">
                    <img src="{{ url('assets/img/contoh-pembayaran.jpg') }}" class="detail-keranjang-card__img"
                        alt="Contoh bukti pembayaran">
                    <h5 class="detail-keranjang-card__img-caption">Contoh Bukti Pembayaran</h5>
                </div>
                <a href="" class="h3 detail-keranjang-card__close">&#10006;</a>
            </form>
            <div class="detail-keranjang-card__bg"></div>
        @endif
    @else
        {{-- else belum masa pembayaran
            tampilkan info tentang periode pembayaran --}}
        <form class="content detail-keranjang-card detail-keranjang-card--submit-ongkir"
            action="{{ route('souvenir', [
                'mode' => 'submit-ongkir',
                'kid' => $k->kid,
            ]) }}"
            method="post" enctype="multipart/form-data">
            <div class="detail-keranjang-card__left">
                @csrf
                <div class="detail-keranjang-card__left-top">
                    <h2>Submit Ongkir</h2>
                    <h5 class="detail-keranjang-card__peringatan">
                        <span>PERINGATAN!</span><br>
                        Jika anda merubah pesanan atau alamat anda setelah submit ongkir, maka informasi
                        ongkir akan otomatis di-reset. Oleh karena itu, anda harus kembali submit ongkir.
                    </h5>
                    <x-form.input-text id="ongkir" label="Total Ongkir (SiCepat REG)"
                        value="{{ old('ongkir') ? old('ongkir') : '' }}" />
                    <x-form.input-img id="img" label="Screenshot Bukti Ongkir" />
                    <a href="{{ url('assets/img/contoh-ongkir.jpg') }}" target="_blank" rel="noopener noreferrer"
                        class="detail-keranjang-card__open-img">Lihat Contoh Screenshot &rarr;</a>
                </div>
                <div class="detail-keranjang-card__left-bottom">
                    <div class="detail-keranjang-card__btns">
                        <button type="submit" class="btn-primary detail-keranjang-card__submit">SUBMIT ONGKIR</button>
                        <a href="" class="detail-keranjang-card__cancel">Batalkan</a>
                    </div>
                </div>
            </div>
            <div class="detail-keranjang-card__right">
                <img src="{{ url('assets/img/contoh-ongkir.jpg') }}" class="detail-keranjang-card__img"
                    alt="Contoh bukti ongkir">
                <h5 class="detail-keranjang-card__img-caption">Contoh Bukti Ongkir</h5>
            </div>
            <a href="" class="h3 detail-keranjang-card__close">&#10006;</a>
        </form>
        <div class="detail-keranjang-card__bg"></div>
    @endif

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        $('.detail-keranjang__dialog-btn--submit-ongkir').click(() => {
            $('.detail-keranjang-card--submit-ongkir')[0].classList.add('active')
        })

        $('.detail-keranjang__dialog-btn--bukti-bayar').click(() => {
            $('.detail-keranjang-card--bukti-bayar')[0].classList.add('active')
        })

        $('.detail-keranjang__dialog-btn--invoice').click(() => {
            $('.detail-keranjang-card__invoice')[0].classList.add('active')
        })
    </script>
@endsection
