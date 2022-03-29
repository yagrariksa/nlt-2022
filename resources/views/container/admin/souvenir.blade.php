@extends('template.admin')

@section('title', 'Souvenir')
@section('seo-desc')

@section('addclass', 'adm-souvenir')

@section('content')
    <div class="adm-souvenir__title-div">
        <h1 class="adm-souvenir__title">Souvenir</h1>
        <a class="button btn-primary" disabled>LIHAT DATA PENJUALAN</a>
    </div>

    <div class="adm-souvenir__content">
        <div class="adm-souvenir__left">
            <div class="adm-souvenir__left-top">
                <h4 class="adm-souvenir__section-title">List Barang</h4>
                <input type="text" class="adm-dashboard__input-search adm-souvenir__input-search" id="adm-souvenir__search"
                    placeholder="Cari" style="">
                <a href="{{ route('a.souvenir', [
                    'mode' => 'add',
                    'object' => 'barang',
                ]) }}"
                    class="button btn-primary">TAMBAH BARANG</a>
            </div>
            <table class="adm-table__table-head adm-table__table adm-souvenir__table">
                <colgroup>
                    <col span="1" style="width: 8%;">
                    <col span="1" style="width: 40%;">
                    <col span="1" style="width: 35%;">
                    <col span="1" style="width: 17%; min-width: 82px">
                </colgroup>
                <thead>
                    <tr>
                        <th><span>No.</span></th>
                        <th><span>Barang</span></th>
                        <th><span>Kategori</span></th>
                        <th><span>Aksi</span></th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $count = 1;
                    @endphp
                    @foreach ($k as $item)
                        @foreach ($item->barang as $barang)
                            <tr>
                                <td>{{ $count }}</td>
                                <td>{{ $barang->nama }}</td>
                                <td>
                                    </span>
                                    <h6 class="badge badge--parent">{{ $item->nama }}</h6>
                                    </span>
                                </td>
                                <td>
                                    <span>
                                        <button class="list-peserta__btn list-peserta__btn--delete"><img
                                                src="{{ url('assets/img/delete.svg') }}"></button>
                                        <form class="adm-souvenir__delete-dialog dialog"
                                            action="{{ route('a.souvenir', [
                                                'mode' => 'delete-my-barang',
                                                'key' => $barang->bar_id,
                                            ]) }}"
                                            method="post">
                                            @csrf
                                            @method('delete')

                                            <h3 class="dialog__title">Hapus Barang?</h3>
                                            <h4 class="dialog__message">Apakah anda yakin ingin menghapus
                                                “{{ $barang->nama }}” dari list souvenir?</h4>
                                            <div class="dialog__btn">
                                                <span class="button dialog__btn-yes list-peserta__batal">Batal</span>
                                                <button type="submit" class="dialog__btn-no">Hapus</button>
                                            </div>
                                        </form>
                                        <div class="dialog__bg"></div>

                                        <a href="{{ route('a.souvenir', [
                                            'mode' => 'edit',
                                            'object' => 'barang',
                                            'key' => $barang->bar_id,
                                        ]) }}"
                                            class="list-peserta__btn list-peserta__btn--edit"><img
                                                src="{{ url('assets/img/edit.svg') }}"></a>
                                    </span>
                                </td>
                            </tr>
                            @php
                                $count++;
                            @endphp
                        @endforeach

                        @foreach ($item->child() as $child)
                            @foreach ($child->barang as $barang)
                                <tr>
                                    <td>{{ $count }}</td>
                                    <td>{{ $barang->nama }}</td>
                                    <td>
                                        <span>
                                            <h6 class="badge badge--parent">{{ $item->nama }}</h6>
                                            <h6 class="badge badge--child">{{ $child->nama }}</h6>
                                        </span>
                                    </td>
                                    <td>
                                        <span>
                                            <button class="list-peserta__btn list-peserta__btn--delete"><img
                                                    src="{{ url('assets/img/delete.svg') }}"></button>
                                            <form class="adm-souvenir__delete-dialog dialog"
                                                action="{{ route('a.souvenir', [
                                                    'mode' => 'delete-my-barang',
                                                    'key' => $barang->bar_id,
                                                ]) }}"
                                                method="post">
                                                @csrf
                                                @method('delete')

                                                <h3 class="dialog__title">Hapus Barang?</h3>
                                                <h4 class="dialog__message">Apakah anda yakin ingin menghapus
                                                    “{{ $barang->nama }}” dari list souvenir?</h4>
                                                <div class="dialog__btn">
                                                    <span class="button dialog__btn-yes list-peserta__batal">Batal</span>
                                                    <button type="submit" class="dialog__btn-no">Hapus</button>
                                                </div>
                                            </form>
                                            <div class="dialog__bg"></div>

                                            <a href="{{ route('a.souvenir', [
                                                'mode' => 'edit',
                                                'object' => 'barang',
                                                'key' => $barang->bar_id,
                                            ]) }}"
                                                class="list-peserta__btn list-peserta__btn--edit"><img
                                                    src="{{ url('assets/img/edit.svg') }}"></a>
                                        </span>
                                    </td>
                                </tr>
                                @php
                                    $count++;
                                @endphp
                            @endforeach
                        @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="adm-souvenir__right">
            <div class="adm-souvenir__right-top">
                <h4 class="adm-souvenir__section-title">List Kategori</h4>
                <a href="{{ route('a.souvenir', [
                    'mode' => 'add',
                    'object' => 'kategori',
                    'key' => 'parent',
                ]) }}"
                    class="list-peserta__btn list-peserta__btn--new add-kategori"><img
                        src="{{ url('assets/img/add.svg') }}"></a>
            </div>

            <div class="adm-souvenir__legends">
                <div class="adm-souvenir__legend">
                    <div class="adm-souvenir__legend-color adm-souvenir__legend-color--utama"></div>
                    <h6 class="adm-souvenir__legend-label">Kategori Utama</h6>
                </div>
                <div class="adm-souvenir__legend">
                    <div class="adm-souvenir__legend-color adm-souvenir__legend-color--subkategori"></div>
                    <h6 class="adm-souvenir__legend-label">Sub-kategori</h6>
                </div>
            </div>

            <div class="adm-souvenir__list-kategori">
                @foreach ($k as $item)
                    <div class="adm-souvenir__kategori kategori-utama">
                        <hr>
                        <h5 class="adm-souvenir__kategori-title">{{ $item->nama }}</h5>
                        <div class="adm-souvenir__kategori-btns">
                            <a href="{{ route('a.souvenir', [
                                'mode' => 'add',
                                'object' => 'barang',
                                'kategori' => $item->kat_id,
                            ]) }}"
                                class="list-peserta__btn list-peserta__btn--new"><img
                                    src="{{ url('assets/img/add-item.svg') }}"></a>

                            <button class="list-peserta__btn list-peserta__btn--delete"><img
                                    src="{{ url('assets/img/delete.svg') }}"></button>
                            <form class="adm-souvenir__delete-dialog dialog"
                                action="{{ route('a.souvenir', [
                                    'mode' => 'delete-my-kategori',
                                    'key' => $item->kat_id,
                                ]) }}"
                                method="post">
                                @csrf
                                @method('delete')

                                <h3 class="dialog__title">Hapus Kategori Utama?</h3>
                                <h4 class="dialog__message">Jika kategori utama dihapus, maka semua barang dengan kategori
                                    “{{ $item->nama }}” serta sub-kategori dari “{{ $item->nama }}” juga akan
                                    terhapus.</h4>
                                <div class="dialog__btn">
                                    <span class="button dialog__btn-yes list-peserta__batal">Batal</span>
                                    <button type="submit" class="dialog__btn-no">Hapus</button>
                                </div>
                            </form>
                            <div class="dialog__bg"></div>

                            <a href="{{ route('a.souvenir', [
                                'mode' => 'edit',
                                'object' => 'kategori',
                                'key' => $item->kat_id,
                            ]) }}"
                                class="list-peserta__btn list-peserta__btn--edit"><img
                                    src="{{ url('assets/img/edit.svg') }}"></a>
                        </div>
                    </div>

                    @foreach ($item->child() as $child)
                        <div class="adm-souvenir__kategori subkategori">
                            <hr>
                            <h6 class="adm-souvenir__kategori-title">{{ $child->nama }}</h6>
                            <div class="adm-souvenir__kategori-btns">
                                <a href="{{ route('a.souvenir', [
                                    'mode' => 'add',
                                    'object' => 'barang',
                                    'kategori' => $child->kat_id,
                                ]) }}"
                                    class="list-peserta__btn list-peserta__btn--new"><img
                                        src="{{ url('assets/img/add-item.svg') }}"></a>

                                <button class="list-peserta__btn list-peserta__btn--delete"><img
                                        src="{{ url('assets/img/delete.svg') }}"></button>
                                <form class="adm-souvenir__delete-dialog dialog"
                                    action="{{ route('a.souvenir', [
                                        'mode' => 'delete-my-kategori',
                                        'key' => $child->kat_id,
                                    ]) }}"
                                    method="post">
                                    @csrf
                                    @method('delete')

                                    <h3 class="dialog__title">Hapus Sub-Kategori?</h3>
                                    <h4 class="dialog__message">Jika sub-kategori dihapus, maka semua barang dengan
                                        sub-kategori “{{ $item->nama }}” akan terhapus.</h4>
                                    <div class="dialog__btn">
                                        <span class="button dialog__btn-yes list-peserta__batal">Batal</span>
                                        <button type="submit" class="dialog__btn-no">Hapus</button>
                                    </div>
                                </form>
                                <div class="dialog__bg"></div>

                                <a href="{{ route('a.souvenir', [
                                    'mode' => 'edit',
                                    'object' => 'kategori',
                                    'key' => $child->kat_id,
                                ]) }}"
                                    class="list-peserta__btn list-peserta__btn--edit"><img
                                        src="{{ url('assets/img/edit.svg') }}"></a>
                            </div>
                        </div>
                    @endforeach

                    <div class="adm-souvenir__kategori add-subkategori">
                        <hr>
                        <h6 class="adm-souvenir__kategori-title">Tambah sub-kategori</h6>
                        <div class="adm-souvenir__kategori-btns">
                            <a href="{{ route('a.souvenir', [
                                'mode' => 'add',
                                'object' => 'kategori',
                                'key' => $item->kat_id,
                            ]) }}"
                                class="list-peserta__btn list-peserta__btn--new add-kategori"><img
                                    src="{{ url('assets/img/add.svg') }}"></a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

@section('other')
    {{-- it can be modal, etc. --}}

    {{-- NOTE :: INI MASIH BERANTAKAN A.K.A. BLM BEKERJA DENGAN BAIK:') --}}
    <form action="{{ route('a.souvenir', [
        'mode' => 'add-new-kategori',
    ]) }}" method="post"
        class="add-kategori__dialog dialog">
        @csrf
        @if (\Request::get('key') == 'parent')
            <h2 class="dialog__title">Tambah Kategori</h2>
        @else
            <div class="dialog__title">
                <h2>Tambah Sub-Kategori</h2>
                <h4>Kategori Utama: {nama kategori}</h4>
            </div>
        @endif
        <x-form.input-text id="nama" class="add-kategori__input" label="Nama Kategori"
            value="{{ old('nama') ? old('nama') : '' }}" />
        <input type="hidden" name="parent" value="{ $k ? $k->id : '' }">
        <div class="dialog__btn">
            <button type="submit" class="dialog__btn-yes">TAMBAH KATEGORI</button>
            <a class="dialog__btn-batal">Batalkan</a>
        </div>
    </form>
    <div class="dialog__bg"></div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        $('.add-kategori').click(e => {
            $('.add-kategori__dialog')[0].classList.add('active')
        })

        $('.dialog__btn-batal').click(() => {
            $('.add-kategori__dialog')[0].classList.remove('active')
        })
    </script>
@endsection
