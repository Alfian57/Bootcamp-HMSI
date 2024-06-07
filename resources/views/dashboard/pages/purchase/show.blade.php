@section('title')
    {{ __('dashboard/purchase-items.index.title') }}
@endsection

<div>
    <x-dashboard::shared.page-container title="{{ __('dashboard/purchase-items.index.page-title') }}">

        <livewire:tables.purchase-items-table :purchase="$purchase" />

    </x-dashboard::shared.page-container>
</div>
