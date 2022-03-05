<div class="radio">
    <label>
        <input type="radio" name="{{ $name }}" value="{{ $label }}" {{ $checked ?? '' }} />
        <i class="radio__helper"></i>
        {{ $label }}
    </label>
</div>
