<div class="d-flex justify-content-end mb-5">
    <x-dashboard::ui.modal id="createCategory" title="{{ __('dashboard/categories.create.title') }}" wire:ignore.self>
        <form wire:submit.prevent="save">

            <x-dashboard::ui.input type="text" label="{{ __('dashboard/categories.form.name.label') }}"
                placeholder="{{ __('dashboard/categories.form.name.placeholder') }}" name="form.name"
                wire:model.defer="form.name" required />

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
    </x-dashboard::ui.modal>

    <x-dashboard::ui.button type="button" data-bs-toggle="modal" data-bs-target="#createCategory">
        {{ __('dashboard/categories.index.create-button') }}
    </x-dashboard::ui.button>
</div>
