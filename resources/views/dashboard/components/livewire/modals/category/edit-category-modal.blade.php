<div>
    <x-dashboard::ui.modal id="{{ $category->slug }}Edit" title="{{ __('dashboard/categories.edit.title') }}"
        wire:ignore.self>
        <form wire:submit.prevent="edit">

            <x-dashboard::ui.input type="text" label="{{ __('dashboard/categories.form.name.label') }}"
                placeholder="{{ __('dashboard/categories.form.name.placeholder') }}" name="form.name"
                wire:model.defer="form.name" required />

            <div class="d-flex justify-content-end mt-3">
                <x-dashboard::ui.button type="submit">
                    {{ __('dashboard/global.submit-btn') }}
                </x-dashboard::ui.button>
            </div>
        </form>
    </x-dashboard::ui.modal>

    <x-dashboard::ui.button type="button" class="btn-sm btn-warning" data-bs-toggle="modal"
        data-bs-target="#{{ $category->slug }}Edit">
        {{ __('dashboard/global.edit-btn') }}
    </x-dashboard::ui.button>
</div>
