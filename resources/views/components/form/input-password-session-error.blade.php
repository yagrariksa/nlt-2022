<div class="form-group {{ $class ?? '' }} @if (Session::has($error)) has-error @endif">
    <input type="password" name="{{ $id }}" id="{{ $id }}" />
    <div class="form-group__see-password"></div>
    <label for="{{ $id }}" class="form-group__control-label">{{ $label }}</label>
    <i class="form-group__bar"></i>
    @if (Session::has($error))
        <h6 class="form-help">{{ Session::get($error) }}</h6>
    @endif
</div>
