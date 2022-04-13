@extends('template.client')

@section('title', 'DASHBOARD')
@section('seo-desc')
@section('seo-img')

@section('addclass', 'sertif')

@section('content')
    @if (Auth::user()->sertif->count())
        <div class="sertif__container-gallery sertif__container-gallery--adm">
            @foreach (Auth::user()->sertif as $img)
                <div class="sertif__img-container">
                    <div class="sertif__img">
                        <img src="{{ url('storage') . '/' . $img->filename }}" alt="{{ $img->filename }}">
                        <a href="{{ url('storage') . '/' . $img->filename }}" alt="{{ $img->filename }}" target="_blank"
                            rel="noopener noreferrer" class="sertif__link">Click to view</a>
                        <span></span>
                    </div>
                    <a href="{{ url('storage') . '/' . $img->filename }}" download="{{ $img->filename }}"
                        class="button btn-primary">DOWNLOAD</a>
                </div>
            @endforeach
        </div>
    @else
        <div class="sertif__container-gallery sertif__container-gallery--adm sertif__container-gallery--none">
            <h2>Sertifikat Belum Diunggah</h2>
        </div>
    @endif
@endsection

@section('other')
    <script>
        const elementSpan = [];

        document.querySelectorAll(".sertif__img").forEach((elm, x) => {
            let addAnimation = false;
            if (!elementSpan[x])
                elementSpan[x] = elm.querySelector("span");

            elm.addEventListener("mouseover", e => {
                elementSpan[x].style.left = e.pageX - elm.offsetLeft + "px";
                elementSpan[x].style.top = e.pageY - elm.offsetTop + "px";
            });

            elm.addEventListener("mouseout", e => {
                elementSpan[x].style.left = e.pageX - elm.offsetLeft + "px";
                elementSpan[x].style.top = e.pageY - elm.offsetTop + "px";
            });
        });
    </script>
@endsection
