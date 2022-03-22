<div class="nav">
    <div class="nav__mobile">
        <a href="{{ route('a.peserta', ['univ' => 'list']) }}">
            <img src="{{ url('assets/img/logo-nlt.png') }}" alt="" class="nav__brand" id="nav__brand">
        </a>
        <div class="nav__burger">
            <span class="line"></span>
            <span class="line"></span>
        </div>
    </div>
    <div class="nav__group content">
        <a href="{{ route('a.peserta', ['univ' => 'list']) }}">
            <img src="{{ url('assets/img/logo-nlt.png') }}" alt="" class="nav__brand" id="nav__brand">
        </a>

        @if (Session::has('admin'))
            @if (Session::get('admin'))
                <div class="nav__items">
                    <a href="
                {{ route('a.peserta', ['univ' => 'list']) }}
                " class="nav__item" id="nav__item--a-univ">LIST UNIVERSITAS <span></span></a>
                    <a href="
                {{ route('a.peserta', [
                    'object' => 'peserta',
                ]) }}
                " class="nav__item" id="nav__item--a-peserta">LIST PESERTA <span></span></a>
                    <a href="
                    {{ route('a.souvenir') }}
                " class="nav__item" id="nav__item--a-souvenir">SOUVENIR<span></span></a>
                    <a href="
                {{-- {{ route('souvenir', [
                    'mode' => 'list',
                ]) }} --}}
                " class="nav__item" id="nav__item--a-absensi">ABSENSI <span></span></a>
                </div>
                <a href="{{ route('a.logout') }}" class="button btn-primary nav__item logout">LOGOUT</a>
                {{-- @else
                    <div class="nav__right-btn">
                        <a href="{{ route('login') }}" class="button btn-secondary">MASUK</a>
                        <a href="{{ route('register') }}" class="button btn-primary">REGISTRASI</a>
                    </div> --}}
            @endif
        @endif
    </div>

</div>
