<div class="form-group position-relative has-icon-left mb-4">
    <input type="{{ $type ?? 'text' }}" class="form-control form-control-xl" name="{{ $name }}"
        placeholder="{{ $placeholder }}" {{ $attributes }}>

    @isset($icon)
        <div class="form-control-icon">
            <i class="{{ $icon }}"></i>
        </div>
    @endisset

    @error($name)
        <small class="form-text text-danger">{{ $message }}</small>
    @enderror
</div>
