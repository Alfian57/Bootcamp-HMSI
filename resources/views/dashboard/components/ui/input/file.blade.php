@props(['label', 'id'])

@php
    $id = $id ?? Str::uuid();
    $name = $attributes->get('name');
    $required = $attributes->get('required') ?? false;
@endphp

<div class="form-group">
    <label for="{{ $id }}">{{ $label }} <span
            class="text-danger">{{ $required ? '*' : '' }}</span></label>
    @if (isset($image))
        {{ $image }}
    @endif
    <input
        {{ $attributes->class('form-control my-2 ' . ($errors->has($name) ? ' is-invalid' : ''))->merge(['type' => 'file']) }}
        id="{{ $id }}">
    @if (isset($toogle))
        {{ $toogle }}
    @endif
    @error($name)
        <small class="form-text text-danger">{{ $message }}</small>
    @enderror
</div>
