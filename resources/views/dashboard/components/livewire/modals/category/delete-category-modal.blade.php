<div>
    <x-dashboard::ui.modal id="categoryDelete" title="{{ __('dashboard/categories.delete.title') }}" wire:ignore.self>
        <x-dashboard::shared.form.delete-form wire:submit.prevent="delete" />
    </x-dashboard::ui.modal>
</div>
