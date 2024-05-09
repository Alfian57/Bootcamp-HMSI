@props(['label', 'id'])

@php
    $id = $id ?? Str::uuid();
    $name = $attributes->get('name');
@endphp

<div class="form-group">
    <label for="{{ $id }}">{{ $label }}</label>
    @isset($body)
        {{ $body }}
    @endisset
    <input
        {{ $attributes->class('form-control ' . ($errors->has($name) ? ' is-invalid' : ''))->merge(['type' => 'text']) }}
        id="{{ $id }}">
    @error($name)
        <small class="form-text text-danger">{{ $message }}</small>
    @enderror
</div>
