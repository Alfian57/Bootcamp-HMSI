@section('title')
    {{ __('dashboard/users.index.title') }}
@endsection

<x-dashboard-layouts::main>
    <x-dashboard::shared.page-container title="{{ __('dashboard/users.index.page-title') }}">
        <div class="d-flex justify-content-end mb-5">
            <x-dashboard::ui.button href="{{ route('dashboard.users.create') }}" wire:navigate>
                {{ __('dashboard/users.index.create-button') }}
            </x-dashboard::ui.button>
        </div>

        <livewire:users-table />

    </x-dashboard::shared.page-container>
</x-dashboard-layouts::main>
