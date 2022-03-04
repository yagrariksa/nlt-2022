<div class="form-group @if ($errors->has($id)) has-error @endif">
    <div class="form-group__input-file">
        <span for="{{ $id }}" class="form-group__filename">{{ $value ?? '' }}</span>
        <div class="button btn-primary">
            <span class="lg">PILIH GAMBAR</span>
            <span class="sm">@include('components.svg.img')</span>
        </div>
    </div>
    <input type="file" accept="image/png, image/jpeg" name="{{ $id }}" id="{{ $id }}"
        value="{{ $value ?? '' }}" />
    <label for="input" class="form-group__control-label">{{ $label }}</label>
    <i class="form-group__bar"></i>
    @if ($errors->has($id))
        <h6 class="form-help">{{ $errors->first($id) }}</h6>
    @endif
</div>
