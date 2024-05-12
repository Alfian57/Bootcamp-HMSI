@section('title')
    {{ __('dashboard/purchase-items.index.title') }}
@endsection

<x-dashboard-layouts::main>
    <x-dashboard::shared.page-container title="{{ __('dashboard/purchase-items.index.page-title') }}">

        <livewire:purchase-items-table :purchase="$purchase" />

    </x-dashboard::shared.page-container>
</x-dashboard-layouts::main>
