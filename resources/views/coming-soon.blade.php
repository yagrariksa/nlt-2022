@extends('template.general')

@section('title', 'COMING SOON NLT AMSA 2022')

@section('content')
    <div class="comingsoon">
        <div class="comingsoon__logos">
            <img src="{{ url('assets/img/logo-amsa.png') }}" alt="">
            <img src="{{ url('assets/img/logo-nlt.png') }}" alt="">
        </div>
        <div class="comingsoon__content">
            <h1 class="xl">Coming Soon</h1>
            <h4>Pendaftaran untuk NLT-AMSA Leadership Training akan segera dibuka. Follow media sosial kami untuk informasi
                lebih lanjut.</h4>
        </div>
        <div class="comingsoon__account">
            <a href="" class="btn-img">
                <x-icon.instagram/>
            </a>
            <a href="" class="btn-img">
                @include('component.tiktok')
            </a>
            <a href="" class="btn-img">
                @include('component.youtube')
            </a>
        </div>
    </div>
@endsection

@section('other')
    <img class="comingsoon__ornament comingsoon__ornament--satu" src="{{ url('assets/img/logo-amsa.png') }}" alt="">
    <img class="comingsoon__ornament comingsoon__ornament--dua" src="{{ url('assets/img/logo-nlt.png') }}" alt="">
@endsection
