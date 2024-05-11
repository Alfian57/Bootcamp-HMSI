@isset($href)
    <a {{ $attributes->class('btn btn-primary rounded ')->merge(['type' => 'button']) }}>{{ $slot }}</a>
@else
    <button {{ $attributes->class('btn btn-primary rounded ')->merge(['type' => 'button']) }}>
        {{ $slot }}
    </button>
@endisset
