<div>
    <x-dashboard::ui.input.switch label="Tambahkan Password" wire:click="toggleShowPassword" />
    @if ($showPassword)
        <x-dashboard::ui.input type="password" label="Password" name="password" placeholder="Masukan password" />

        <x-dashboard::ui.input type="password" label="Konfirmasi Password" name="password_confirmation"
            placeholder="Masukan Konfirmasi password" />
    @endif
</div>
