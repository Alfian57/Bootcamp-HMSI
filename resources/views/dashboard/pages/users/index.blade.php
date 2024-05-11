@section('title')
    Kelola Pengguna
@endsection

<x-dashboard-layouts::main>
    <x-dashboard::shared.page-container title="Pengguna">
        <div class="d-flex justify-content-end mb-5">
            <x-dashboard::ui.button href="{{ route('dashboard.users.create') }}" wire:navigate>
                Tambah Pengguna
            </x-dashboard::ui.button>
        </div>

        <livewire:users-table />

    </x-dashboard::shared.page-container>
</x-dashboard-layouts::main>
