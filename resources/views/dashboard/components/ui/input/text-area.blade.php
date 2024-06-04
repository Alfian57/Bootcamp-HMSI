@props(['label', 'value' => ''])

@php
    $id = Str::uuid();
    $name = $attributes->get('name');
@endphp

<div class="form-group">
    <label for="{{ $id }}" class=" form-control-label">{{ $label }}</label>
    <textarea {{ $attributes->class('form-control ' . ($errors->has($name) ? ' is-invalid' : ''))->merge(['rows' => '9']) }}
        id="{{ $id }}">{{ $value }}</textarea>
    @error($name)
        <small class="form-text text-danger">{{ $message }}</small>
    @enderror
</div>
