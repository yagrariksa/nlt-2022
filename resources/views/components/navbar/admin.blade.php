<div class="nav">
    <div class="nav__group content admin">
        <a href="{{ route('home') }}">
            <img src="{{ url('assets/img/logo-nlt.png') }}" alt="" class="nav__brand" id="nav__brand">
        </a>

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
            <a href="#
                {{-- {{ route('souvenir', [
                    'mode' => 'list',
                ]) }} --}}
                " class="nav__item" id="nav__item--a-absensi" onclick="alert('coming soon')">ABSENSI
                <span></span></a>
        </div>
        <a href="{{ route('a.logout') }}" class="button btn-primary nav__item logout">LOGOUT</a>
    </div>

    <div class="nav__mobile admin">
        <a href="{{ route('home') }}">
            <img src="{{ url('assets/img/logo-nlt.png') }}" alt="" class="nav__brand" id="nav__brand">
        </a>
        <div class="nav__burger">
            <span class="line"></span>
            <span class="line"></span>
        </div>

        <div class="nav__mobile-item">
            <div class="content">
                <a href="
                {{ route('a.peserta', ['univ' => 'list']) }}
                " class="nav__item" id="nav__item--a-univ-sm">
                    <h2>List Universitas</h2>
                </a>
                <a href="
                {{ route('a.peserta', [
                    'object' => 'peserta',
                ]) }}
                " class="nav__item" id="nav__item--a-peserta-sm">
                    <h2>List Peserta</h2>
                </a>
                <a href="javascript:alert('coming soon')
                {{-- {{ route('souvenir', [
                    'mode' => 'list',
                ]) }} --}}
                " class="nav__item" id="nav__item--a-souvenir-sm">
                    <h2>Souvenir</h2>
                </a>
                <a href="javascript:alert('coming soon')
                {{-- {{ route('souvenir', [
                    'mode' => 'list',
                ]) }} --}}
                " class="nav__item" id="nav__item--a-absensi-sm">
                    <h2>Absensi</h2>
                </a>
                <hr>
                <a href="{{ route('a.logout') }}" class="nav__item logout">
                    <h2>Logout</h2>
                </a>
                <hr>
                <h5 class="nav__profile">Anda Masuk Sebagai <span>Admin</span></h5>
            </div>
        </div>
    </div>
</div>
