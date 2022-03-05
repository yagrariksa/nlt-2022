<div class="alert error {{ $class ?? '' }}">
    <img src="{{ url('assets/img/alert-error.svg') }}" alt="" class="alert__icon">
    <h4 class="alert__title">{{ $title }}</h4>
    <h5 class="alert__desc">{{ $desc }}</h5>
    <span class="alert__close">&times;</span>
</div>
