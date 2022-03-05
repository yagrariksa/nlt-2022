@include('be.dump.head')
@if (Session::has('status'))
    @if (Session::get('status') == 'fail')
        <span class="error">{{Session::get('message')}}</span>
    @endif
@endif
<form action="{{ route('forgot-password') }}" method="post">
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
    <input type="text" name="email" placeholder="email ketua">
    @if ($errors->has('email'))
        <span class="error">{{ $errors->first('email') }}</span>
    @endif
    <input type="text" name="nama" id="" placeholder="nama ketua">
    @if ($errors->has('nama'))
        <span class="error">{{ $errors->first('nama') }}</span>
    @endif
    <button type="submit">Reset Password</button>
</form>
@include('be.dump.foot')
