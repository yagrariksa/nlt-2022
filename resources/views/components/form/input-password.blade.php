<div class="form-group {{ $class ?? '' }} @if ($errors->has($id)) has-error @endif">
    <input type="password" name="{{ $id }}" id="{{ $id }}" />
    <div class="form-group__see-password"></div>
    <label for="{{ $id }}" class="form-group__control-label">{{ $label }}</label>
    <i class="form-group__bar"></i>
    @if ($errors->has($id))
        <h6 class="form-help">{{ $errors->first($id) }}</h6>
    @endif
</div>
