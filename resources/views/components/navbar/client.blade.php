<div class="nav">
    <div class="nav__mobile">
        <a href="{{ route('home') }}">
            <img src="{{ url('assets/img/logo-nlt.png') }}" alt="" class="nav__brand" id="nav__brand">
        </a>
        <div class="nav__burger">
            <span class="line"></span>
            <span class="line"></span>
        </div>
    </div>
    <div class="nav__group content">
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
                <a href="{{ route('peserta', [
                    'mode' => 'list',
                    'object' => 'travel',
                ]) }}"
                    class="nav__item" id="nav__item--travel">TRAVEL PLAN <span></span></a>
                <a href="{{ route('souvenir', [
                    'mode' => 'list',
                ]) }}"
                    class="nav__item" id="nav__item--souvenir">SOUVENIR <span></span></a>
                {{-- <a href="" class="nav__item" id="nav__item--about">ABOUT <span></span></a> --}}
            </div>
            <img src="{{ url('assets/img/profile.png') }}" alt="" class="nav__profile">
            <div class="nav__dropdown">
                <a href="{{ route('akun.setting') }}" class="nav__item" id="nav__item--password"">UBAH PASSWORD</a>
                <a href=" {{ route('logout') }}" class="   nav__item logout">LOGOUT</a>
            </div>
        @else
            <div class="nav__right-btn">
                <a href="{{ route('login') }}" class="button btn-secondary">MASUK</a>
                <a href="{{ route('register') }}" class="button btn-primary">REGISTRASI</a>
            </div>
        @endif
    </div>

</div>
