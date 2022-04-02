<div class="nav">
    <div class="nav__group content @if (!Auth::User()) guest @endif">
        <a href="{{ route('home') }}">
            <img src="{{ url('assets/img/logo-nlt.png') }}" alt="" class="nav__brand" id="nav__brand">
        </a>

        @if (Auth::User())
            <div class="nav__items">
                <a href="{{ route('peserta', [
                    'mode' => 'list',
                    'object' => 'peserta',
                ]) }}"
                    class="nav__item" id="nav__item--peserta">LIST PESERTA <span></span></a>
                <a href="{{ route('absensi', [
                    'mode' => 'list',
                ]) }}"
                    class="nav__item" id="nav__item--absensi">ABSENSI <span></span></a>
                <a href="{{ route('souvenir', [
                    'mode' => 'list',
                    'object' => 'katalog',
                ]) }}"
                    class="nav__item" id="nav__item--souvenir">SOUVENIR <span></span></a>
            </div>
            <h4 class="nav__profile">Halo, {{ Auth::user()->akronim }} <img
                    src="{{ url('assets/img/profile.png') }}" alt="" class="nav__profile-img"></h4>
            <div class="nav__dropdown">
                <a href="{{ route('akun.setting') }}" class="nav__item" id="nav__item--password"">UBAH PASSWORD</a>
                <a href=" {{ route('logout') }}" class="nav__item logout">LOGOUT</a>
            </div>
        @else
            <div class="nav__right">
                <a href="#about" class="nav__item">ABOUT <span></span></a>
                <a href="#agendas" class="nav__item">AGENDAS <span></span></a>
                <a href="#guideline" class="nav__item">GUIDELINE <span></span></a>
                <a href="#timeline" class="nav__item">TIMELINE <span></span></a>
                {{-- <a href="#our-sponsor" class="nav__item">OUR SPONSOR <span></span></a> --}}
                {{-- <a href="#contact-us" class="nav__item">CONTACT US <span></span></a> --}}
                <a href="{{ route('login') }}" class="nav__item nav__item--masuk">MASUK <span></span></a>
                <a href="{{ route('register') }}"
                    class="button btn-primary nav__item nav__item--registrasi">REGISTRASI
                    <span></span></a>
            </div>
        @endif
    </div>

    <div class="nav__mobile @if (!Auth::User()) guest @endif">
        <a href="{{ route('home') }}">
            <img src="{{ url('assets/img/logo-nlt.png') }}" alt="" class="nav__brand" id="nav__brand">
        </a>
        <div class="nav__burger">
            <span class="line"></span>
            <span class="line"></span>
        </div>

        <div class="nav__mobile-item">
            <div class="content">
                @if (Auth::User())
                    <a href="{{ route('peserta', [
                        'mode' => 'list',
                        'object' => 'peserta',
                    ]) }}"
                        class="nav__item" id="nav__item--peserta-sm">
                        <h2>List Peserta</h2>
                    </a>
                    <a href="{{ route('absensi', [
                        'mode' => 'list',
                    ]) }}"
                        class="nav__item" id="nav__item--absensi-sm">
                        <h2>Absensi</h2>
                    </a>
                    <a href="{{ route('souvenir', [
                        'mode' => 'list',
                    ]) }}"
                        class="nav__item" id="nav__item--souvenir-sm">
                        <h2>Souvenir</h2>
                    </a>
                    <hr>
                    <a href="{{ route('akun.setting') }}" class="nav__item" id="nav__item--password-sm""><h2>Ubah Password</h2></a>
                    <a href=" {{ route('logout') }}" class="nav__item logout">
                        <h2>Logout</h2>
                    </a>
                    <hr>
                    <h5 class="nav__profile">Anda Masuk Sebagai <span>{{ Auth::user()->akronim }}</span></h5>
                @else
                    <a href="#about" class="nav__item nav__item--sm">
                        <h2>About</h2>
                    </a>
                    <a href="#agendas" class="nav__item nav__item--sm">
                        <h2>Agendas</h2>
                    </a>
                    <a href="#guideline" class="nav__item nav__item--sm">
                        <h2>Guideline</h2>
                    </a>
                    <a href="#timeline" class="nav__item nav__item--sm">
                        <h2>Timeline</h2>
                    </a>
                    {{-- <a href="#our-sponsor" class="nav__item nav__item--sm">
                    <h2>Our Sponsor</h2>
                </a>
                <a href="#contact-us" class="nav__item nav__item--sm">
                    <h2>Contact Us</h2>
                </a> --}}
                    <hr>
                    <a href="{{ route('login') }}" class="nav__item nav__item--masuk">
                        <h2>Masuk</h2>
                    </a>
                    <a href="{{ route('register') }}" class="nav__item nav__item--registrasi">
                        <h2>Registrasi</h2>
                    </a>
                    <hr>
                @endif
            </div>
        </div>
    </div>
</div>
