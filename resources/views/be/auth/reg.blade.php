@include('be.dump.head')

<h1>Registrasi Ketua AMSA Universitas</h1>

<h3>Perlunya diperhatikan mekanisme registrasi</h3>
<h4>para peserta akan mendaftar menggunakan dashboard per universitas
    <br>untuk membuka dashboard universitas, maka ketua AMSA Universitas harus melakukan registrasi ketua terlebih
    dahulu
    <br>Setelah itu, perwakilan AMSA Universitas yang akan mengikuti NLT 2022 akan mendaftar menggunakan dashboard
    universitas (tidak pada halaman ini)
</h4>

<form action="{{ route('register') }}" method="post" enctype="multipart/form-data">
    @csrf
    <select name="univ" id="">
        <option value="" selected disabled>pilih univ</option>
        <option value="unair">unair</option>
        <option value="undip">undip</option>
        <option value="universitas indonesia">universitas indonesia</option>
    </select>
    @if ($errors->has('univ'))
        <span class="error">{{ $errors->first('univ') }}</span>
    @endif
    <input type="text" name="jabatan" id="" value="Ketua" disabled>
    <input type="password" placeholder="password" name="password" id="">
    @if ($errors->has('password'))
        <span class="error">{{ $errors->first('password') }}</span>
    @endif
    <input type="password" placeholder="password confirmation" name="password_confirmation" id="">
    <input type="text" placeholder="email" name="email" id="" value="{{ old('email') }}">
    @if ($errors->has('email'))
        <span class="error">{{ $errors->first('email') }}</span>
    @endif
    <input type="text" placeholder="nama" name="nama" id="">
    @if ($errors->has('nama'))
        <span class="error">{{ $errors->first('nama') }}</span>
    @endif
    <input type="text" placeholder="no HP" name="handphone" id="" value="{{ old('handphone') }}">
    @if ($errors->has('handphone'))
        <span class="error">{{ $errors->first('handphone') }}</span>
    @endif
    <input type="text" placeholder="alergi" name="alergi makanan" id="">

    <input type="file" placeholder="ktp" name="ktp">
    @if ($errors->has('ktp'))
        <span class="error">{{ $errors->first('ktp') }}</span>
    @endif
    <input type="file" placeholder="pas" name="pas" value="{{ old('pas') }}">
    @if ($errors->has('pas'))
        <span class="error">{{ $errors->first('pas') }}</span>
    @endif
    <div class="row">
        <input type="radio" id="yes" name="vegan" value="yes">
        <label for="yes">yes</label>
    </div>

    <div class="row">
        <input type="radio" id="no" name="vegan" value="no">
        <label for="no">no</label>
    </div>

    @if ($errors->has('vegan'))
        <span class="error">{{ $errors->first('vegan') }}</span>
    @endif
    <button type="submit">register</button>
    <a href="{{ route('login') }}">login</a>
</form>

@include('be.dump.foot')
