@extends('template.client')

@section('title', 'SPONSOR')
@section('seo-desc')
@section('seo-img')

@section('addclass', 'sponsor-page')

@section('content')
    <div class="sponsor-page__text">
        <h1 class="sponsor-page__title">Burger King</h1>
        <h4 class="sponsor-page__desc">Burger King Corporation, restaurant company specializing in flame-broiled fast-food
            hamburgers. It is the second largest hamburger chain the the United States, after McDonald's. In the early 21st
            century, Burger King claimed to have about 14,000 stores in nearly 100 countries</h4>
    </div>
    <img src="{{ url('assets/img/excel.svg') }}" alt="" class="sponsor-page__logo">
@endsection

@section('other')
    {{-- it can be modal, etc. --}}
@endsection
