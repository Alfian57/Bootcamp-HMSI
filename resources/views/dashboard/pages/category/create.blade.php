@section('title')
    {{ __('dashboard/categories.create.title') }}
@endsection

<x-dashboard-layouts::main>
    <x-dashboard::shared.page-container title="{{ __('dashboard/categories.create.page-title') }}">

        <form action="{{ route('dashboard.categories.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <x-dashboard::ui.input type="text" label="{{ __('dashboard/categories.form.name.label') }}" name="name"
                placeholder="{{ __('dashboard/categories.form.name.placeholder') }}" value="{{ old('name') }}"
                required />

            <div class="d-flex justify-content-end mb-5 mt-3">
                <x-dashboard::ui.button type="submit">
                    {{ __('dashboard/global.submit-btn') }}
                </x-dashboard::ui.button>
            </div>
        </form>

    </x-dashboard::shared.page-container>
</x-dashboard-layouts::main>
