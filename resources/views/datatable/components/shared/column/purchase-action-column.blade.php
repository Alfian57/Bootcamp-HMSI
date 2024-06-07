<div class="d-flex gap-3">
    <x-dashboard::ui.button type="button" wire:click="downloadInvoice('{{ $id }}')" class="btn-sm btn-info">
        {{ __('dashboard/global.download-invoice-btn') }}
    </x-dashboard::ui.button>

    <x-dashboard::ui.button @click="$dispatch('set-purchase-delete-modal', { id: '{{ $id }}' })" type="button"
        class="btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#purchaseDelete">
        {{ __('dashboard/global.delete-btn') }}
    </x-dashboard::ui.button>

    <x-dashboard::ui.button class="btn-sm btn-warning" href="{{ route('dashboard.purchases.edit', $id) }}" wire:navigate>
        {{ __('dashboard/global.edit-btn') }}
    </x-dashboard::ui.button>
</div>
