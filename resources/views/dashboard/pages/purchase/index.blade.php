@section('title')
    {{ __('dashboard/purchases.index.title') }}
@endsection

<div>
    <x-dashboard::shared.page-container title="{{ __('dashboard/purchases.index.page-title') }}">
        <div class="d-flex justify-content-end mb-5">
            <x-dashboard::ui.button href="{{ route('dashboard.purchases.create') }}" wire:navigate>
                {{ __('dashboard/purchases.index.create-button') }}
            </x-dashboard::ui.button>
        </div>

        <livewire:modals.purchase.delete-purchase-modal />
        <livewire:tables.purchases-table />

    </x-dashboard::shared.page-container>
</div>
