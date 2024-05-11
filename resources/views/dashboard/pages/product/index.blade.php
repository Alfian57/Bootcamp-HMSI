@section('title')
    Kelola Produk
@endsection

<x-dashboard-layouts::main>
    <x-dashboard::shared.page-container title="Produk">
        <div class="d-flex justify-content-end mb-5">
            <x-dashboard::ui.button href="{{ route('dashboard.products.create') }}" wire:navigate>
                Tambah Produk
            </x-dashboard::ui.button>
        </div>

        <livewire:products-table />

    </x-dashboard::shared.page-container>
</x-dashboard-layouts::main>
