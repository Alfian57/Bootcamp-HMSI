@props(['label', 'id'])

@php
    $id = $id ?? Str::uuid();
    $name = $attributes->get('name');
@endphp

<div class="form-group">
    <label for="{{ $id }}">{{ $label }}</label>
    @if (isset($image))
        {{ $image }}
    @endif
    <input
        {{ $attributes->class('form-control ' . ($errors->has($name) ? ' is-invalid' : ''))->merge(['type' => 'file']) }}
        id="{{ $id }}">
    @error($name)
        <small class="form-text text-danger">{{ $message }}</small>
    @enderror
</div>
