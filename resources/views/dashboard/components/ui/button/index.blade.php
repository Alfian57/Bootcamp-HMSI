@php
    $btnType = $attributes->get('btnType') ?? 'btn-primary';
@endphp

@isset($href)
    <a class="btn rounded {{ $btnType }}" href="{{ $href }}" {{ $attributes }}>{{ $slot }}</a>
@else
    <button class="btn rounded {{ $btnType }}" type="{{ $type ?? 'button' }}" {{ $attributes }}>
        {{ $slot }}
    </button>
@endisset
