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
            <a href="{{ url('https://www.instagram.com/amsaindonesia/') }}" target="_blank" class="btn-img">
                @include('components.svg.instagram')
            </a>
            <a href="{{ url('https://amsaindonesia.org/amsa-indonesia/') }}" target="_blank" class="btn-img">
                @include('components.svg.web')
            </a>
            <a href="{{ url('https://youtube.com/user/AMSAIndonesia') }}" target="_blank" class="btn-img">
                @include('components.svg.youtube')
            </a>
        </div>
    </div>
@endsection

@section('other')
    <img class="comingsoon__ornament comingsoon__ornament--satu" src="{{ url('assets/img/logo-amsa.png') }}" alt="">
    <img class="comingsoon__ornament comingsoon__ornament--dua" src="{{ url('assets/img/logo-nlt.png') }}" alt="">
@endsection
