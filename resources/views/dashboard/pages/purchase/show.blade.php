@section('title')
    Kelola Detail Pembelian
@endsection

<x-dashboard-layouts::main>
    <x-dashboard::shared.page-container title="Detail Pembelian">

        <livewire:purchase-items-table :purchase="$purchase" />

    </x-dashboard::shared.page-container>
</x-dashboard-layouts::main>
