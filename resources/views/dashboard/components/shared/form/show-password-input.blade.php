<div>
    <x-dashboard::ui.input.switch label="{{ __('dashboard/users.form.show-password.label') }}"
        wire:click="toggleShowPassword" name="switch" />
    @if ($showPassword)
        <x-dashboard::ui.input type="password" label="{{ __('dashboard/users.form.password.label') }}" name="password"
            placeholder="{{ __('dashboard/users.form.password.placeholder') }}" />

        <x-dashboard::ui.input type="password" label="{{ __('dashboard/users.form.password-confirmation.label') }}"
            name="password_confirmation"
            placeholder="{{ __('dashboard/users.form.password-confirmation.placeholder') }}" />
    @endif
</div>
