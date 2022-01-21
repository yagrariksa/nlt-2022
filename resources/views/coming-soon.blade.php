@extends('template.general')

@section('title', 'COMING SOON NLT AMSA 2022')
@section('seo-desc',
    'Pendaftaran untuk NLT-AMSA Leadership Training akan segera dibuka. Follow media sosial kami untuk
    informasi lebih lanjut.',)
@section('seo-img', "{{ url('assets/img/logo-amsa.png') }}")

@section('overflow', 'overflow: hidden')

@section('addclass', 'comingsoon__container')

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
            <a href="{{ url('https://www.instagram.com/amsaunair/') }}" target="_blank" class="btn-img">
                @include('component.instagram')
            </a>
            <a href="{{ url('https://line.me/ti/p/%40323ucnji') }}" target="_blank" class="btn-img">
                @include('component.line')
            </a>
            <a href="{{ url('https://www.youtube.com/channel/UC-wMfFLL_52AGQ1JkNTpsLQ') }}" target="_blank"
                class="btn-img">
                @include('component.youtube')
            </a>
        </div>
    </div>
@endsection

@section('other')
    <img class="comingsoon__ornament comingsoon__ornament--satu" src="{{ url('assets/img/logo-amsa.png') }}" alt="">
    <img class="comingsoon__ornament comingsoon__ornament--dua" src="{{ url('assets/img/logo-nlt.png') }}" alt="">
@endsection
