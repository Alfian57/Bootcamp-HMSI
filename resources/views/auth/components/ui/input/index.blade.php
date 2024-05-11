@props(['label', 'id', 'icon'])

@php
    $id = $id ?? Str::uuid();
    $name = $attributes->get('name');
@endphp

<div class="form-group position-relative has-icon-left mb-4">
    <input
        {{ $attributes->class('form-control form-control-xl ' . ($errors->has($name) ? ' is-invalid' : ''))->merge(['type' => 'text']) }}>

    @isset($icon)
        <div class="form-control-icon">
            <i class="{{ $icon }}"></i>
        </div>
    @endisset

    @error($name)
        <small class="form-text text-danger">{{ $message }}</small>
    @enderror
</div>
