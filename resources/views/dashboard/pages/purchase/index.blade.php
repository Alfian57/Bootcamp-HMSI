@section('title')
    Kelola Pembelian
@endsection

<x-dashboard-layouts::main>
    <x-dashboard::shared.page-container title="Pembelian">

        <livewire:purchases-table />

    </x-dashboard::shared.page-container>
</x-dashboard-layouts::main>
