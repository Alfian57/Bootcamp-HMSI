<div class="d-flex justify-content-end mb-5">
    <x-dashboard::ui.modal id="createCategory" title="{{ __('dashboard/categories.create.title') }}" wire:ignore.self>
        <form wire:submit.prevent="save">

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

    <x-dashboard::ui.button type="button" data-bs-toggle="modal" data-bs-target="#createCategory">
        {{ __('dashboard/categories.index.create-button') }}
    </x-dashboard::ui.button>
</div>
