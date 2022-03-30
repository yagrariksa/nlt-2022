<div
    class="form-group form-group--select-new {{ $class ?? '' }} @if ($errors->has($id)) has-error @endif @if ($value != '') readonly @endif">
    @php
        if (gettype($options) != 'array' && gettype($options) == 'string') {
            $options = explode(',', $options);
        }
    @endphp
    <select name="{{ $id }}" id="{{ $id }}">
        <option value="{{ $label }}">{{ $label }}</option>
        @foreach ($options as $option)
            <option value="{{ $option }}" @if ($option == $value) selected @endif>{{ $option }}
            </option>
        @endforeach
    </select>
    @if ($errors->has($id))
        <h6 class="form-help">{{ $errors->first($id) }}</h6>
    @endif
</div>
