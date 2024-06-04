<div>
    <x-dashboard::ui.modal id="{{ $product->slug }}Delete" title="{{ __('dashboard/products.delete.title') }}"
        wire:ignore.self>
        <form wire:submit.prevent="delete">
            <h4 class="text-center">{{ __('dashboard/global.delete-confirmation.text') }}</h4>

            <div class="d-flex gap-3 justify-content-center mt-3">
                <x-dashboard::ui.button type="submit" class="btn-sm btn-secondary">
                    {{ __('dashboard/global.delete-confirmation.cancel') }}
                </x-dashboard::ui.button>

                <x-dashboard::ui.button type="submit" class="btn-sm btn-danger">
                    {{ __('dashboard/global.delete-confirmation.confirm') }}
                </x-dashboard::ui.button>
            </div>

        </form>
    </x-dashboard::ui.modal>

    <x-dashboard::ui.button type="button" class="btn-sm btn-danger" data-bs-toggle="modal"
        data-bs-target="#{{ $product->slug }}Delete">
        {{ __('dashboard/global.delete-btn') }}
    </x-dashboard::ui.button>
</div>
