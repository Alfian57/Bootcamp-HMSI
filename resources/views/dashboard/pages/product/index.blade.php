@section('title')
    {{ __('dashboard/products.index.title') }}
@endsection

<x-dashboard-layouts::main>
    <x-dashboard::shared.page-container title="{{ __('dashboard/products.index.page-title') }}">
        <div class="d-flex justify-content-end mb-5">
            <x-dashboard::ui.button href="{{ route('dashboard.products.create') }}" wire:navigate>
                {{ __('dashboard/products.index.create-button') }}
            </x-dashboard::ui.button>
        </div>

        <livewire:products-table />

    </x-dashboard::shared.page-container>
</x-dashboard-layouts::main>
