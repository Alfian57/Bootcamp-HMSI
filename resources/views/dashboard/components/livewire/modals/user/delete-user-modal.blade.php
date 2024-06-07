<x-dashboard::ui.modal id="userDelete" title="{{ __('dashboard/users.delete.title') }}" wire:ignore.self>
    <x-dashboard::shared.form.delete-form wire:submit.prevent="delete" />
</x-dashboard::ui.modal>
