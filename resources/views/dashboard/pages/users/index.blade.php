@section('title')
    {{ __('dashboard/users.index.title') }}
@endsection

<div>
    <x-dashboard::shared.page-container title="{{ __('dashboard/users.index.page-title') }}">

        <livewire:modals.user.delete-user-modal />
        <livewire:modals.user.edit-user-modal />
        <livewire:modals.user.create-user-modal />

        <livewire:tables.users-table />

    </x-dashboard::shared.page-container>
</div>
