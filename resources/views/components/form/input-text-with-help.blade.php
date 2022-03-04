<div class="form-group {{ $class }}">
    <input type="text" id="{{ $id }}" value="{{ $value ?? '' }}" />
    <label for="{{ $id }}" class="form-group__control-label">{{ $label }}</label>
    <i class="form-group__bar"></i>
    <h6 class="form-help">{{ $helper }}</h6>
</div>
