@extends('template.client')

@section('title', 'Detail Keranjang Alamat')
@section('seo-desc')
@section('seo-img')

@section('addclass', 'detail-keranjang')

@section('content')
    <h4 class="mobile-title">Detail Keranjang Alamat</h4>
    <div class="detail-keranjang__title">
        <h1>Detail Keranjang Alamat</h1>
        <a href="{{ route('souvenir', [
            'mode' => 'list',
            'object' => 'kantong',
        ]) }}"
            class="button btn-primary">LIST KERANJANG ALAMAT <img src="{{ url('assets/img/white-arrow.svg') }}"></a>
    </div>
    <div class="keranjang__card detail-keranjang__card">
        <div class="keranjang__card--left detail-keranjang__card--left">
            <h3 class="keranjang__card--title">{{ $k->nama }}</h3>
            <h4 class="keranjang__card--desc">Nama lengkap - nomor telpon</h4>
            <h4 class="keranjang__card--desc">{{ $k->alamat }}</h4>
        </div>
        <div class="detail-keranjang__card--right">
            <h3 class="keranjang__card--harga">Ongkir : <span>Rp{{ $k->souv_total()['total_harga'] }}</span></h3>
            <hr>
            <div class="detail-keranjang__action">
                <a href="{{ route('souvenir', [
                    'mode' => 'edit',
                    'object' => 'kantong',
                    'kid' => $k->kid,
                ]) }}"
                    class="list-peserta__btn list-peserta__btn--edit"><img src="{{ url('assets/img/edit.svg') }}"></a>

                <button class="list-peserta__btn list-peserta__btn--delete"><img
                        src="{{ url('assets/img/delete.svg') }}"></button>
                <form class="detail-keranjang__delete-dialog dialog"
                    action="{{ route('souvenir', [
                        'mode' => 'delete-my-kantong',
                    ]) }}"
                    method="post">
                    @csrf
                    @method('delete')

                    <h3 class="dialog__title">Hapus Keranjang Alamat Beserta Barang?</h3>
                    <h4 class="dialog__message">Apakah anda yakin ingin menghapus keranjang alamat
                        “{{ $k->nama }}”?
                        Jika Keranjang Alamat dihapus, maka barang didalamnya juga akan terhapus.</h4>
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
                    <h4 class="detail-keranjang__item--harga-sm">Rp{{ $item->harga }}</h4>
                    <div class="detail-keranjang__action">
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
    {{-- it can be modal, etc. --}}
@endsection
