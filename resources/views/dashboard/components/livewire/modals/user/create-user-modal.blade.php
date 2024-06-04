<div class="d-flex justify-content-end mb-5">
    <x-dashboard::ui.modal id="createUser" title="{{ __('dashboard/users.create.title') }}" wire:ignore.self>
        <form wire:submit.prevent="save">

            <x-dashboard::ui.input type="email" label="{{ __('dashboard/users.form.email.label') }}" name="form.email"
                wire:model.defer="form.email" placeholder="{{ __('dashboard/users.form.email.placeholder') }}" required />

            <x-dashboard::ui.input type="text" label="{{ __('dashboard/users.form.name.label') }}" name="form.name"
                wire:model.defer="form.name" placeholder="{{ __('dashboard/users.form.name.placeholder') }}" required />

            <x-dashboard::ui.input.select label="{{ __('dashboard/users.form.gender.label') }}" name="form.gender"
                wire:model.defer="form.gender" :options="$genders" :selected="$form->gender" required />

            <x-dashboard::ui.input.select label="{{ __('dashboard/users.form.is-admin.label') }}" name="form.is_admin"
                wire:model.defer="form.is_admin" :options="$roles" :selected="$form->is_admin" required />

            <x-dashboard::ui.input.select label="{{ __('dashboard/users.form.is-active.label') }}" name="form.is_active"
                wire:model.defer="form.is_active" :options="$activeOptions" :selected="$form->is_active" required />

            <x-dashboard::ui.input type="date" label="{{ __('dashboard/users.form.date-of-birth.label') }}"
                name="form.date_of_birth" wire:model.defer="form.date_of_birth"
                placeholder="{{ __('dashboard/users.form.date-of-birth.placeholder') }}" required />

            <x-dashboard::ui.input type="tel" label="{{ __('dashboard/users.form.phone-number.label') }}"
                name="form.phone_number" wire:model.defer="form.phone_number"
                placeholder="{{ __('dashboard/users.form.phone-number.placeholder') }}" required />

            {{-- <x-dashboard::ui.input type="file" label="{{ __('dashboard/users.form.photo-profile.label') }}"
                wire:model.defer="form.photo_profile" /> --}}

            <x-dashboard::ui.input.switch label="{{ __('dashboard/users.form.show-password.label') }}"
                wire:click="toggleShowPassword" :checked="$showPassword" />

            @if ($showPassword)
                <x-dashboard::ui.input type="password" label="{{ __('dashboard/users.form.password.label') }}"
                    name="form.password" placeholder="{{ __('dashboard/users.form.password.placeholder') }}" />

                <x-dashboard::ui.input type="password"
                    label="{{ __('dashboard/users.form.password-confirmation.label') }}"
                    name="form.password_confirmation"
                    placeholder="{{ __('dashboard/users.form.password-confirmation.placeholder') }}" />
            @endif

            <p class="text-info">{{ __('dashboard/users.create.form-info') }}</p>

            <div class="d-flex justify-content-end mt-3">
                <x-dashboard::ui.button type="submit">
                    {{ __('dashboard/global.submit-btn') }}
                </x-dashboard::ui.button>
            </div>

        </form>
    </x-dashboard::ui.modal>

    <x-dashboard::ui.button type="button" data-bs-toggle="modal" data-bs-target="#createUser">
        {{ __('dashboard/users.index.create-button') }}
    </x-dashboard::ui.button>
</div>
