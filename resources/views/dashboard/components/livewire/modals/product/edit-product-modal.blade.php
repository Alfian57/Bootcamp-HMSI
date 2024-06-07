<x-dashboard::ui.modal id="productEdit" title="{{ __('dashboard/products.edit.title') }}" wire:ignore.self>
    <form wire:submit.prevent="edit">

        <x-dashboard::ui.input type="text" label="{{ __('dashboard/products.form.name.label') }}"
            wire:model.defer="form.name" name="form.name"
            placeholder="{{ __('dashboard/products.form.name.placeholder') }}" required />

        <x-dashboard::ui.input type="number" label="{{ __('dashboard/products.form.price.label') }}"
            wire:model.defer="form.price" name="form.price"
            placeholder="{{ __('dashboard/products.form.price.placeholder') }}" required />

        <x-dashboard::ui.input.select label="{{ __('dashboard/products.form.category.label') }}"
            wire:model.defer="form.category_id" name="form.category_id" :options="$categories" :selected="$product?->category_id" required />

        <x-dashboard::ui.input type="number" step="any" label="{{ __('dashboard/products.form.weight.label') }}"
            wire:model.defer="form.weight" name="form.weight"
            placeholder="{{ __('dashboard/products.form.weight.placeholder') }}" required />

        <x-dashboard::ui.input type="number" label="{{ __('dashboard/products.form.stock.label') }}"
            wire:model.defer="form.stock" name="form.stock"
            placeholder="{{ __('dashboard/products.form.stock.placeholder') }}" required />

        <x-dashboard::ui.input.file label="{{ __('dashboard/products.form.image.label') }}"
            wire:model.defer="form.image" name="form.image" name="form.image" wire:change="toogleIsImageNew">
            @if (!$isEmptyImage)
                <x-slot name="image">
                    <div class="row">
                        @if ($isImageNew)
                            <img src="{{ $form->image->temporaryUrl() }}" class="img-fluid col-6">
                        @elseif(!$isImageNew && $form->image)
                            <img src="{{ asset('storage/' . $form->image) }}" class="img-fluid col-6">
                        @else
                            <p class="text-info">Foto Kosong</p>
                        @endif
                    </div>
                </x-slot>
            @endif

            <x-slot name="toogle">
                <x-dashboard::ui.input.switch label="{{ __('dashboard/products.form.empty-image.label') }}"
                    wire:click="toogleEmptyImage" :checked="$isEmptyImage" />
            </x-slot>
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
