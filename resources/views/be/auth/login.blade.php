@include('be.dump.head')
@if (Session::has('auth.msg'))
    <span class="error">{{ Session::get('auth.msg') }}</span>
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
</form>
@include('be.dump.foot')
