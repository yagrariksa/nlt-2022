@include('be.dump.head')
<form action="{{ route('peserta', [
    'mode' => 'add',
    'object' => 'peserta',
]) }}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="text" placeholder="email" name="email" id="" value="{{old('email')}}">
    @if ($errors->has('email'))
        <span class="error">{{ $errors->first('email') }}</span>
    @endif
    <input type="text" placeholder="nama" name="nama" id="" value="{{old('nama')}}">
    @if ($errors->has('nama'))
        <span class="error">{{ $errors->first('nama') }}</span>
    @endif
    <select name="jabatan" id="">
        <option value="" selected disabled>--pilih jabatan--</option>
        <option value="a">a</option>
        <option value="b">b</option>
        <option value="c">c</option>
    </select>
    <input type="text" placeholder="no HP" name="handphone" id="" value="{{ old('handphone') }}">
    @if ($errors->has('handphone'))
        <span class="error">{{ $errors->first('handphone') }}</span>
    @endif
    <input type="text" placeholder="alergi" name="alergi" id="" value="{{old('alergi')}}">

    <input type="file" placeholder="ktp" name="ktp">
    @if ($errors->has('ktp'))
        <span class="error">{{ $errors->first('ktp') }}</span>
    @endif
    <input type="file" placeholder="pas" name="pas" value="{{ old('pas') }}">
    @if ($errors->has('pas'))
        <span class="error">{{ $errors->first('pas') }}</span>
    @endif
    
    <h4>vegan</h4>
    <div class="row">
        <input type="radio" id="yes" name="vegan" value="yes"
        @if (old('vegan') ==  'yes')
            checked
        @endif>
        <label for="yes">yes</label>
    </div>

    <div class="row">
        
        <input type="radio" id="no" name="vegan" value="no"
        @if (old('vegan') ==  'no')
            checked
        @endif
        >
        <label for="no">no</label>
    </div>

    @if ($errors->has('vegan'))
        <span class="error">{{ $errors->first('vegan') }}</span>
    @endif
    <button type="submit">Tambah Peserta</button>
</form>
@include('be.dump.foot')
