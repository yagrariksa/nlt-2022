<div class="form-group {{ $class ?? '' }} @if ($errors->has($id)) has-error @endif">
    <textarea rows="3" name="{{ $id }}" id="{{ $id }}"
        {{ $attr ?? '' }}>{{ $value ?? '' }}</textarea>
    <label for="{{ $id }}" class="form-group__control-label">{{ $label }}</label>
    <i class="form-group__bar"></i>
    @if ($errors->has($id))
        <h6 class="form-help">{{ $errors->first($id) }}</h6>
    @endif
</div>
