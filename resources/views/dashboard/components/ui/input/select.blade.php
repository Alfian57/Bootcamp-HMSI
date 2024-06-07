@props(['label', 'options', 'selected'])

@php
    $id = Str::uuid();
    $name = $attributes->get('name');
    $required = $attributes->get('required') ?? false;

@endphp

<div class="form-group mb-3">
    <label class="form-group-text" for="{{ $id }}">{{ $label }} <span
            class="text-danger">{{ $required ? '*' : '' }}</span></label>

    <select {{ $attributes->class('form-select ' . ($errors->has($name) ? ' is-invalid' : '')) }}
        id="{{ $id }}">

        @foreach ($options as $key => $value)
            <option value="{{ $key }}" @if ($selected == $key) selected @endif>{{ $value }}
            </option>
        @endforeach

    </select>

    @error($name)
        <small class="form-text text-danger">{{ $message }}</small>
    @enderror
</div>
