@php
    use \Illuminate\Support\Str
@endphp
<div class="dropdown">
    <button class="btn dropdown-toggle text-secondary" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        {{ Str::upper(app()->getLocale()) }}
    </button>
    <ul class="dropdown-menu">
        @foreach(config('app.available_locales') as $available_locale)
            @if($available_locale !== app()->getLocale())
                <li><a class="dropdown-item"
                       href="/language/{{ $available_locale }}">{{ Str::upper($available_locale) }}</a></li>
            @endif
        @endforeach
    </ul>
</div>
