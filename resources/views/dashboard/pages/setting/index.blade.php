@section('title')
    {{ __('dashboard/setting.title') }}
@endsection

<div>
    <x-dashboard::shared.page-container title="{{ __('dashboard/setting.page-title') }}">

        <div class="row">

            <div class="col-12 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center justify-content-center gap-3 mb-3">
                            <div class="col-4 position-relative">
                                @if ($isImageNew)
                                    <img src="{{ $updatePhotoForm->photo_profile->temporaryUrl() }}" alt="Avatar"
                                        class="img-fluid rounded-circle" style="aspect-ration: 1/1;">
                                @elseif (auth()->user()->photo_profile)
                                    <img src="{{ asset('storage/' . auth()->user()->photo_profile) }}" alt="Avatar"
                                        class="img-fluid rounded-circle" style="aspect-ration: 1/1;">
                                @else
                                    <img src="{{ asset('assets/static/images/avatar.jpg') }}" alt="Avatar"
                                        class="img-fluid rounded-circle" style="aspect-ration: 1/1;">
                                @endif
                            </div>
                            <div class="d-flex flex-column align-items-center justify-content-center">
                                <span class="fw-bold">{{ auth()->user()->name }}</span>
                                <span>{{ auth()->user()->is_admin ? __('enum.role.admin') : __('enum.role.buyer') }}</span>
                            </div>
                        </div>

                        <form wire:submit.prevent="updatePhoto">
                            <x-dashboard::ui.input.file
                                label="{{ __('dashboard/setting.update-photo-form.photo-profile.label') }}"
                                wire:model.defer="updatePhotoForm.photo_profile" name="updatePhotoForm.photo_profile"
                                wire:change="toogleIsImageNew">
                            </x-dashboard::ui.input.file>

                            <div class="d-flex justify-content-end mt-3" wire:loading.attr="disabled">
                                <x-dashboard::ui.button type="submit">
                                    <div wire:loading>
                                        Loading...
                                    </div>
                                    <div wire:loading.remove>
                                        {{ __('dashboard/global.submit-btn') }}
                                    </div>
                                </x-dashboard::ui.button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6">
                <div class="card">
                    <div class="card-body">

                        <x-dashboard::ui.input type="password"
                            label="{{ __('dashboard/setting.change-password-form.new-password.label') }}"
                            name="changePasswordForm.new_password" wire:model.defer="changePasswordForm.new_password"
                            placeholder="{{ __('dashboard/setting.change-password-form.new-password.placeholder') }}" />

                        <x-dashboard::ui.input type="password"
                            label="{{ __('dashboard/setting.change-password-form.new-password-confirmation.label') }}"
                            name="changePasswordForm.password_confirmation"
                            wire:model.defer="changePasswordForm.password_confirmation"
                            placeholder="{{ __('dashboard/setting.change-password-form.new-password-confirmation.placeholder') }}" />

                        <x-dashboard::ui.input type="password"
                            label="{{ __('dashboard/setting.change-password-form.old-password.label') }}"
                            name="changePasswordForm.old_password" wire:model.defer="changePasswordForm.old_password"
                            placeholder="{{ __('dashboard/setting.change-password-form.old-password.placeholder') }}" />

                        <div class="d-flex justify-content-end mt-3" wire:loading.attr="disabled">
                            <x-dashboard::ui.button type="submit">
                                <div wire:loading>
                                    Loading...
                                </div>
                                <div wire:loading.remove>
                                    {{ __('dashboard/global.submit-btn') }}
                                </div>
                            </x-dashboard::ui.button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </x-dashboard::shared.page-container>
</div>
