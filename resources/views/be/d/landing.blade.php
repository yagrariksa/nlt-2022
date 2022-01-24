@include('be.dump.head')
<a href="{{route('peserta', [
    'mode' => 'list',
    'object' => 'peserta'
])}}">peserta</a>
<a href="{{route('peserta', [
    'mode' => 'list',
    'object' => 'travel'
])}}">travel</a>
@include('be.dump.foot')
