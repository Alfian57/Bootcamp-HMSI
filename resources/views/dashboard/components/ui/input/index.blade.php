<div class="form-group">
    <label for="{{ $name }}">{{ $label }}</label>
    <input type="{{ $type ?? 'text' }}" id="{{ $name }}" name="{{ $name }}"
        class="form-control @error($name) is-invalid @enderror" placeholder="{{ $placeholder ?? '' }}"
        @disabled(isset($disabled))>
    @error($name)
        <small class="form-text text-danger">{{ $message }}</small>
    @enderror
</div>
