@section('title')
    {{ __('dashboard/purchases.index.title') }}
@endsection

<x-dashboard-layouts::main>
    <x-dashboard::shared.page-container title="{{ __('dashboard/purchases.index.page-title') }}">

        <livewire:purchases-table />

    </x-dashboard::shared.page-container>
</x-dashboard-layouts::main>
