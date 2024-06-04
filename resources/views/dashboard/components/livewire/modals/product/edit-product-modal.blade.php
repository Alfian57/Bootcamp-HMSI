<div>
    <x-dashboard::ui.modal id="{{ $product->slug }}Edit" title="{{ __('dashboard/products.edit.title') }}"
        wire:ignore.self>
        <form wire:submit.prevent="edit">

            <x-dashboard::ui.input type="text" label="{{ __('dashboard/products.form.name.label') }}"
                wire:model.defer="form.name" placeholder="{{ __('dashboard/products.form.name.placeholder') }}"
                required />

            <x-dashboard::ui.input type="number" label="{{ __('dashboard/products.form.price.label') }}"
                wire:model.defer="form.price" placeholder="{{ __('dashboard/products.form.price.placeholder') }}"
                required />

            <x-dashboard::ui.input.select label="{{ __('dashboard/products.form.category.label') }}"
                wire:model.defer="form.category_id" :options="$categories" :selected="$product->category_id" required />

            <x-dashboard::ui.input type="number" label="{{ __('dashboard/products.form.weight.label') }}"
                wire:model.defer="form.weight" placeholder="{{ __('dashboard/products.form.weight.placeholder') }}"
                required />

            <x-dashboard::ui.input type="number" label="{{ __('dashboard/products.form.stock.label') }}"
                wire:model.defer="form.stock" placeholder="{{ __('dashboard/products.form.stock.placeholder') }}"
                required />

            <x-dashboard::ui.input.file label="{{ __('dashboard/products.form.image.label') }}"
                wire:model.defer="form.image" name="form.image">
                <x-slot name="image">
                    @if ($form->image)
                        <div class="row">
                            <img src="{{ $form->image->temporaryUrl() }}" class="img-fluid col-6">
                        </div>
                    @endif
                    <x-dashboard::ui.input.switch label="{{ __('dashboard/products.form.empty-image.label') }}"
                        wire:click="toogleEmptyImage" :checked="$isEmptyImage" />
                </x-slot>
            </x-dashboard::ui.input.file>

            <x-dashboard::ui.input.text-area label="{{ __('dashboard/products.form.description.label') }}"
                wire:model.defer="form.description"
                placeholder="{{ __('dashboard/products.form.description.placeholder') }}" required />

            <div class="d-flex justify-content-end mt-3">
                <x-dashboard::ui.button type="submit">
                    {{ __('dashboard/global.submit-btn') }}
                </x-dashboard::ui.button>
            </div>
        </form>
    </x-dashboard::ui.modal>

    <x-dashboard::ui.button type="button" class="btn-sm btn-warning" data-bs-toggle="modal"
        data-bs-target="#{{ $product->slug }}Edit">
        {{ __('dashboard/global.edit-btn') }}
    </x-dashboard::ui.button>
</div>
