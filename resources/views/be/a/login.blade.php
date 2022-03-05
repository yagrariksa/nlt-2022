@include('be.dump.head')
<form action="{{ route('a.login') }}" method="post">
    @csrf
    <input type="password" name="pw" id="">
    <button type="submit">login</button>
</form>
@include('be.dump.foot')