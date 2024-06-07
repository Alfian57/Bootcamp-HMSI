<div class="d-flex justify-content-end mb-5">
    <x-dashboard::ui.modal id="createProduct" title="{{ __('dashboard/products.create.title') }}" wire:ignore.self>
        <form wire:submit.prevent="save">

            <x-dashboard::ui.input type="text" label="{{ __('dashboard/products.form.name.label') }}"
                wire:model.defer="form.name" name="form.name"
                placeholder="{{ __('dashboard/products.form.name.placeholder') }}" required />

            <x-dashboard::ui.input type="number" label="{{ __('dashboard/products.form.price.label') }}"
                wire:model.defer="form.price" name="form.price"
                placeholder="{{ __('dashboard/products.form.price.placeholder') }}" required />

            <x-dashboard::ui.input.select label="{{ __('dashboard/products.form.category.label') }}"
                wire:model.defer="form.category_id" name="form.category_id" :options="$categories" :selected="$form->category_id"
                required />

            <x-dashboard::ui.input type="number" label="{{ __('dashboard/products.form.weight.label') }}"
                wire:model.defer="form.weight" step="any" name="form.weight"
                placeholder="{{ __('dashboard/products.form.weight.placeholder') }}" required />

            <x-dashboard::ui.input type="number" label="{{ __('dashboard/products.form.stock.label') }}"
                wire:model.defer="form.stock" name="form.stock"
                placeholder="{{ __('dashboard/products.form.stock.placeholder') }}" required />

            <x-dashboard::ui.input.file label="{{ __('dashboard/products.form.image.label') }}"
                wire:model.defer="form.image" name="form.image">
                @if ($form->image)
                    <x-slot name="image">
                        <div class="row">
                            <img src="{{ $form->image->temporaryUrl() }}" class="img-fluid col-6">
                        </div>
                    </x-slot>
                @endif
            </x-dashboard::ui.input.file>

            <x-dashboard::ui.input.text-area label="{{ __('dashboard/products.form.description.label') }}"
                wire:model.defer="form.description" name="form.description"
                placeholder="{{ __('dashboard/products.form.description.placeholder') }}" />

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

    <x-dashboard::ui.button type="button" data-bs-toggle="modal" data-bs-target="#createProduct">
        {{ __('dashboard/products.index.create-button') }}
    </x-dashboard::ui.button>
</div>
