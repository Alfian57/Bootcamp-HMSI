@section('title')
    {{ __('dashboard/products.index.title') }}
@endsection

<div>
    <x-dashboard::shared.page-container title="{{ __('dashboard/products.index.page-title') }}">

        <livewire:modals.product.create-product-modal />
        <livewire:tables.products-table />

    </x-dashboard::shared.page-container>
</div>
