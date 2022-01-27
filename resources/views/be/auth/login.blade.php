@include('be.dump.head')
@if (Session::has('auth.msg'))
    <span class="error">{{ Session::get('auth.msg') }}</span>
@endif
@if (Session::has('error'))
    <span class="error">{{ Session::get('error') }}</span>
@endif
@if (app('request')->input('status') == 'success')
    <span class="error">{{ app('request')->input('message') }}</span>
@endif
<form action="{{ route('login') }}" method="post">
    @csrf
    <select name="univ" id="">
        <option value="" selected disabled>pilih univ</option>
        <option value="unair">unair</option>
        <option value="undip">undip</option>
        <option value="universitas indonesia">universitas indonesia</option>
    </select>
    <input type="password" name="password" id="">
    <button type="submit">login</button>
    <a href="{{ route('register') }}">Register</a>
    <a href="{{ route('forgot-password') }}">Lupa Password</a>
</form>
@include('be.dump.foot')
