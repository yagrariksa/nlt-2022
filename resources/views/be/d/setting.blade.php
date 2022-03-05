@include('be.dump.head')
<form action="{{ route('akun.setting') }}" method="post">
    @csrf
    <input type="password" placeholder="password lama" name="password_lama">
    @if ($errors->has('password_lama'))
        <span class="error">{{ $errors->first('password_lama') }}</span>
    @endif
    @if (Session::has('password_lama'))
        <span class="error">{{ Session::get('password_lama') }}</span>
    @endif
    <input type="password" placeholder="password baru" name="password_baru">
    @if ($errors->has('password_baru'))
        <span class="error">{{ $errors->first('password_baru') }}</span>
    @endif
    <input type="password" placeholder="password lama" name="password_baru_confirmation">
    <button type="submit">ganti password</button>
</form>
@if (Session::has('success'))
    @if (Session::get('success') != [])
        <h4>{{ Session::get('success') }}</h4>
    @endif
@endif
@include('be.dump.foot')
