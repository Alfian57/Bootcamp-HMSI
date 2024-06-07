<x-dashboard::ui.modal id="purchaseDelete" title="{{ __('dashboard/purchases.delete.title') }}" wire:ignore.self>
    <x-dashboard::shared.form.delete-form wire:submit.prevent="delete" />
</x-dashboard::ui.modal>
