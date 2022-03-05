@extends('be.dump.temp')

@section('content')

    <ul>
        @foreach (Auth::user()->peserta as $p)
            <li>{{ $p->nama }}

                <ul>
                    @foreach ($p->souvenir as $item)
                        <li>
                            {{ $item->item_name }}, {{ $item->item_count }}, {{ $item->item_price }}
                        </li>
                    @endforeach
                </ul>
            </li>
        @endforeach
    </ul>
@endsection
