<x-dashboard::ui.modal id="productDelete" title="{{ __('dashboard/products.delete.title') }}" wire:ignore.self>
    <x-dashboard::shared.form.delete-form wire:submit.prevent="delete" />
</x-dashboard::ui.modal>
