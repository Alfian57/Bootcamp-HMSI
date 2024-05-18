@section('title')
    {{ __('dashboard/categories.index.title') }}
@endsection

<x-dashboard-layouts::main>
    <x-dashboard::shared.page-container title="{{ __('dashboard/categories.index.page-title') }}">
        <div class="d-flex justify-content-end mb-5">
            <x-dashboard::ui.button href="{{ route('dashboard.categories.create') }}" wire:navigate>
                {{ __('dashboard/categories.index.create-button') }}
            </x-dashboard::ui.button>
        </div>

        <livewire:categories-table />

    </x-dashboard::shared.page-container>
</x-dashboard-layouts::main>
