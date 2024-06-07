<div>
    <x-dashboard::ui.modal id="categoryEdit" title="{{ __('dashboard/categories.edit.title') }}" wire:ignore.self>
        <form wire:submit.prevent="edit">

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
</div>
