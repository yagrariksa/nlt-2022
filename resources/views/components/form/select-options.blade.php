<div
    class="form-group form-group--select {{ $class ?? '' }} @if ($errors->has($id)) has-error @endif @if ($value != '') readonly @endif">
    @php
        if (gettype($options) != 'array' && gettype($options) == 'string') {
            $options = explode(',', $options);
        }
    @endphp
    <select name="{{ $id }}" id="{{ $id }}">
        <option value=""></option>
        @foreach ($options as $option)
            <option value="{{ $option }}" @if ($option == $value) selected @endif>{{ $option }}
            </option>
        @endforeach
    </select>
    <label for="select" class="form-group__control-label">{{ $label }}</label>
    <i class="form-group__bar"></i>
    @if ($helper != '')
        <h6 class="form-help">
            {{ $helper ?? '' }}
            <a href="{{ $helperUrl ?? '' }}">{{ $helperLink ?? '' }}</a>
        </h6>
    @endif
    @if ($errors->has($id))
        <h6 class="form-help">{{ $errors->first($id) }}</h6>
    @endif
</div>
