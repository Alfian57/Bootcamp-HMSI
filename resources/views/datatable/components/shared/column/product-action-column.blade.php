<div class="d-flex gap-3">
    <x-dashboard::ui.button @click="$dispatch('set-product-delete-modal', { id: '{{ $id }}' })" type="button"
        class="btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#productDelete">
        {{ __('dashboard/global.delete-btn') }}
    </x-dashboard::ui.button>

    <x-dashboard::ui.button @click="$dispatch('set-product-edit-modal', { id: '{{ $id }}' })" type="button"
        class="btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#productEdit">
        {{ __('dashboard/global.edit-btn') }}
    </x-dashboard::ui.button>
</div>
