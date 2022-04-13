@extends('template.admin')

@section('title', 'Upload Sertifikat')
@section('seo-desc')

@section('addclass', 'add-sertif')

@section('content')
    <form action="{{ route('a.peserta', ['mode' => 'upload-sertif']) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="add-sertif__top">
            <h2 class="add-sertif__title">Upload Sertifikat</h2>
            <x-form.input-text id="email" label="Universitas (Terisi Otimatis)" value="{{ $univ->email }}"
                attr="readonly" />
            <div class="form-group @if ($errors->has('image')) has-error @endif">
                <div class="form-group__input-file">
                    <span class="form-group__filename"></span>
                    <div class="button btn-primary">
                        <span class="lg">PILIH GAMBAR</span>
                        <span class="sm">@include('components.svg.img')</span>
                    </div>
                </div>
                <input type="file" accept="image/png, image/jpeg" name="image[]" id="image" value="" multiple required />
                <label for="input" class="form-group__control-label">Pilih Sertifikat*</label>
                <i class="form-group__bar"></i>
                <h6 class="form-help">* Dapat memilih banyak sertifikat sekaligus</h6>
                @if ($errors->has('image'))
                    <h6 class="form-help">{{ $errors->first('image') }}</h6>
                @endif
            </div>
        </div>

        <div class="add-sertif__bottom">
            <button type="submit" class="btn-primary add-sertif__submit">UPLOAD SERTIFIKAT</button>
            <a href="{{ route('a.peserta', [
                'object' => 'peserta',
                'univ' => $univ->email,
            ]) }}"
                class="add-sertif__batal">Batalkan</a>
        </div>
    </form>
@endsection

@section('other')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        $('#image').change(e => {
            $("span.form-group__filename")[0].innerHTML = e.target.files.length + ' files';
            if (e.target.files.length > 0) {
                $("span.form-group__filename")[0].parentElement.nextElementSibling.classList.add('has-value')
            }
        })
    </script>
@endsection
