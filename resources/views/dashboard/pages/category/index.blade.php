@section('title')
    {{ __('dashboard/categories.index.title') }}
@endsection

<div>
    <x-dashboard::shared.page-container title="{{ __('dashboard/categories.index.page-title') }}">

        <livewire:modals.category.delete-category-modal />
        <livewire:modals.category.edit-category-modal />
        <livewire:modals.category.create-category-modal />

        <livewire:tables.categories-table />

    </x-dashboard::shared.page-container>
</div>
