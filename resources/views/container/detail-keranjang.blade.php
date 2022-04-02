@extends('template.client')

@section('title', 'Detail Keranjang')
@section('seo-desc')
@section('seo-img')

@section('addclass', 'detail-keranjang')

@section('content')
    <h6 class="souvenir-breadcrumb">
        <a href="" class="h6 souvenir-breadcrumb__item">Souvenir</a> /
        <a href="" class="h6 souvenir-breadcrumb__item">List Keranjang</a> /
        <a href="" class="h6 souvenir-breadcrumb__item active">Detail Keranjang</a>
    </h6>
    <h4 class="mobile-title">Detail Keranjang</h4>
    <div class="detail-keranjang__title">
        <h1>Detail Keranjang</h1>
        <a href="{{ route('souvenir', [
            'mode' => 'list',
            'object' => 'kantong',
        ]) }}"
            class="button btn-primary">LIST KERANJANG <img src="{{ url('assets/img/white-arrow.svg') }}"></a>
    </div>
    <div class="keranjang__card detail-keranjang__card">
        <div class="keranjang__card--left detail-keranjang__card--left">
            <h3 class="keranjang__card--title">{{ $k->nama }}</h3>
            <h4 class="keranjang__card--desc">{{$k->penerima}} - {{$k->no}}</h4>
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
                    {{-- if tanggal sudah masa pembayaran --}}
                    @if ($k->invoice_url)
                        {{-- kalo udah bayar --}}
                        <button class="detail-keranjang__dialog-btn detail-keranjang__dialog-btn--submit-ongkir" disabled>
                            Submit Ongkir</button>
                        <button class="detail-keranjang__dialog-btn detail-keranjang__dialog-btn--invoice">
                            Lihat Bukti Pembayaran</button>
                    @else
                        {{-- kalo belom bayar --}}
                        <button class="detail-keranjang__dialog-btn detail-keranjang__dialog-btn--submit-ongkir" disabled>
                            Submit Ongkir</button>
                        <button class="detail-keranjang__dialog-btn detail-keranjang__dialog-btn--bukti-bayar">
                            Upload Bukti Pembayaran</button>
                    @endif
                @else
                    {{-- else belum masa pembayaran
                                tampilkan info tentang periode pembayaran --}}
                    <button class="detail-keranjang__dialog-btn detail-keranjang__dialog-btn--submit-ongkir">
                        Submit Ongkir</button>
                    <button class="detail-keranjang__dialog-btn detail-keranjang__dialog-btn--bukti-bayar" disabled>
                        Upload Bukti Pembayaran</button>
                @endif

                <a href="{{ route('souvenir', [
                    'mode' => 'edit',
                    'object' => 'kantong',
                    'kid' => $k->kid,
                ]) }}"
                    class="list-peserta__btn list-peserta__btn--edit detail-keranjang__edit"><img
                        src="{{ url('assets/img/edit.svg') }}"></a>

                @if (!$k->invoice_url)
                    <button class="list-peserta__btn list-peserta__btn--delete detail-keranjang__delete"><img
                            src="{{ url('assets/img/delete.svg') }}"></button>
                @else
                    <button class="list-peserta__btn list-peserta__btn--delete detail-keranjang__delete" disabled><img
                            src="{{ url('assets/img/delete.svg') }}"></button>
                @endif
                <form class="detail-keranjang__delete-dialog dialog"
                    action="{{ route('souvenir', [
                        'mode' => 'delete-my-kantong',
                        'kid' => $k->kid,
                    ]) }}"
                    method="post">
                    @csrf
                    @method('delete')

                    <h3 class="dialog__title">Hapus Keranjang Beserta Barang?</h3>
                    <h4 class="dialog__message">Apakah anda yakin ingin menghapus keranjang
                        “{{ $k->nama }}”?
                        Jika Keranjang dihapus, maka barang didalamnya juga akan terhapus.</h4>
                    <div class="dialog__btn">
                        <span class="button dialog__btn-yes list-peserta__batal">Batal</span>
                        <button type="submit" class="dialog__btn-no">Hapus</button>
                    </div>
                    <input type="hidden" name="kid" value="{{ $k->kid }}">
                </form>
                <div class="dialog__bg"></div>
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
                <hr>
                <div class="detail-keranjang__item--right">
                    <h5 class="detail-keranjang__item--harga-sm">Rp{{ $item->harga }}</h5>
                    <div class="detail-keranjang__item-action">
                        <a href="{{ route('souvenir', [
                            'object' => 'katalog',
                            'mode' => 'edit',
                            's_id' => $item->souv_id,
                        ]) }}"
                            class="list-peserta__btn list-peserta__btn--edit"><img
                                src="{{ url('assets/img/edit.svg') }}"></a>

                        <button class="list-peserta__btn list-peserta__btn--delete"><img
                                src="{{ url('assets/img/delete.svg') }}"></button>
                        <form class="detail-keranjang__delete-dialog dialog"
                            action="{{ route('souvenir', [
                                'mode' => 'delete-my-item',
                                'id' => $item->id,
                            ]) }}"
                            method="post">
                            @csrf
                            @method('delete')

                            <h3 class="dialog__title">Hapus Barang?</h3>
                            <h4 class="dialog__message">Apakah anda yakin ingin menghapus
                                “{{ $item->nama }}” dari keranjang ini?</h4>
                            <div class="dialog__btn">
                                <span class="button dialog__btn-yes list-peserta__batal">Batal</span>
                                <button type="submit" class="dialog__btn-no">Hapus</button>
                            </div>
                            <input type="hidden" name="kid" value="{{ $k->kid }}">
                        </form>
                        <div class="dialog__bg"></div>
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
