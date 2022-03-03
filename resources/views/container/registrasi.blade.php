@extends('template.general')

@section('title', 'REGISTRASI')
@section('seo-desc',
    'Segera daftarkan universitas anda untuk mengikuti NLT-AMSA 2022! (help aku gajago bikin kata-kata
    ginian dan ini keknya jelek bgt huehehe)',)

@section('bodyclass', 'registrasi__body')
@section('addclass', 'registrasi')

@section('content')
    <form action="{{ route('register') }}" method="post" enctype="multipart/form-data">
        @csrf
        <h2 class="registrasi__title">Registrasi</h2>
        <div class="registrasi__form-left">
            <x-form.input-text id="email" label="Email Ketua" value="{{ old('email') ? old('email') : '' }}" />
            <x-form.input-text id="nama" label="Nama Ketua" value="{{ old('nama') ? old('nama') : '' }}" />
            <x-form.input-text id="handphone" label="Nomor Telepon Ketua"
                value="{{ old('handphone') ? old('handphone') : '' }}" />
            <x-form.input-text id="line" label="ID Line Ketua" value="{{ old('line') ? old('line') : '' }}" />
        </div>
        <x-form.input-password id="password" label="Password" class=" registrasi__password" />
        <x-form.input-password id="password_confirmation" label="Konfirmasi Password"
            class=" registrasi__confirm-password" />
        <div class="registrasi__form-right">
            <x-form.select-options id="univ" label="Universitas" options='[
                                        "Universitas Sriwijaya",
                                        "Universitas Jambi",
                                        "Universitas Syiah Kuala",
                                        "Universitas Batam",
                                        "Universitas Muhammadiyah Palembang",
                                        "Universitas Indonesia",
                                        "Universitas Katolik Indonesia Atma Jaya",
                                        "Universitas Kristen Krida Wacana",
                                        "Universitas Tarumanagara",
                                        "Universitas Trisakti",
                                        "Universitas Pelita Harapan",
                                        "Universitas Kristen Indonesia",
                                        "Universitas Pembangunan Nasional Veteran Jakarta",
                                        "Universitas Padjadjaran",
                                        "Universitas Jenderal Achmad Yani",
                                        "Maranatha Christian University",
                                        "Universitas Swadaya Gunung Jati",
                                        "Universitas Gadjah Mada",
                                        "Universitas Sebelas Maret",
                                        "Universitas Diponegoro",
                                        "Universitas Palangka Raya",
                                        "Universitas Brawijaya",
                                        "Universitas Airlangga",
                                        "Universitas Hang Tuah",
                                        "Universitas Muhammadiyah Malang",
                                        "Universitas Jember",
                                        "Universitas Hasanuddin",
                                        "Universitas Muslim Indonesia",
                                        "Universitas Sam Ratulangi",
                                        "Universitas Alkhairaat",
                                        "Universitas Tadulako",
                                        "Universitas Pattimura",
                                        "Universitas Muhammadiyah Makassar",
                                        "Universitas Halu Oleo",
                                        "Universitas Bosowa",
                                        "Universitas Khairun",
                                        "Universitas Mataram",
                                        "Universitas Islam Negeri Maulana Malik Ibrahim Malang"
                                    ]' class=""
                value="{{ Session::get('univ') ? Session::get('univ') : '' }}"
                value="{{ old('univ') ? old('univ') : '' }}" />
            <x-form.input-text id="email-univ" label="Email Unik Universitas"
                value="{{ old('email-univ') ? old('email-univ') : '' }}" attr="readonly" />
            <x-form.input-text id="akronim" label="akronim" value="{{ old('akronim') ? old('akronim') : '' }}"
                class=" hidden" attr="readonly" />
            <x-form.input-text id="jabatan" label="Jabatan" value="Representative AMSA Universitas" attr="readonly" />
            {{-- <x-form.select-options id="jabatan" label="Jabatan" value="Ketua AMSA Universitas" options='{
                "1":"Ketua AMSA Universitas",
                "2":"Anggota AMSA Universitas",
                "3":"Lainnya"
            }' /> --}}
            <x-form.input-img id="pas" label="Pas Foto (JPG atau PNG)" />
        </div>
        <p class="registrasi__to-masuk">Anda sudah memiliki akun? <a href="{{ route('login') }}">Masuk</a></p>
        <button type="submit" class="btn-primary registrasi__submit">REGISTRASI</button>
    </form>
@endsection

@section('other')
    @if (Session::has('message'))
        <x-alert.error title="{{ Session::get('title') }}" desc="{{ Session::get('message') }}" />
    @endif
@endsection
