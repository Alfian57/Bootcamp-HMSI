@props(['label', 'checked'])

@php
    $id = $id ?? Str::uuid();
    $name = $attributes->get('name');
@endphp

<div class="form-check form-switch row">
    <div>
        <input {{ $attributes->class('form-check-input ' . ($errors->has($name) ? ' is-invalid' : '')) }} type="checkbox"
            id="{{ $id }}" @checked($checked)>
        <label class="form-check-label" for="{{ $id }}">{{ $label }}</label>
    </div>
    @error($name)
        <small class="form-text text-danger">{{ $message }}</small>
    @enderror
</div>
