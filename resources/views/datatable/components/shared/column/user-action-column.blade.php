<div class="d-flex gap-3 justify-content-center">
    @if ($id != auth()->user()->id)
        <x-dashboard::ui.button @click="$dispatch('set-user-delete-modal', { id: '{{ $id }}' })" type="button"
            class="btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#userDelete">
            {{ __('dashboard/global.delete-btn') }}
        </x-dashboard::ui.button>
    @endif

    <x-dashboard::ui.button @click="$dispatch('set-user-edit-modal', { id: '{{ $id }}' })" type="button"
        class="btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#userEdit">
        {{ __('dashboard/global.edit-btn') }}
    </x-dashboard::ui.button>
</div>
