@section('title')
    {{ __('dashboard/products.create.title') }}
@endsection

<x-dashboard-layouts::main>
    <x-dashboard::shared.page-container title="{{ __('dashboard/products.create.page-title') }}">

        <form action="{{ route('dashboard.products.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <x-dashboard::ui.input type="text" label="{{ __('dashboard/products.form.name.label') }}" name="name"
                placeholder="{{ __('dashboard/products.form.name.placeholder') }}" value="{{ old('name') }}" required />

            <x-dashboard::ui.input.text-area label="{{ __('dashboard/products.form.description.label') }}"
                name="description" placeholder="{{ __('dashboard/products.form.description.placeholder') }}"
                value="{{ old('description') }}" required />

            <x-dashboard::ui.input type="number" label="{{ __('dashboard/products.form.price.label') }}" name="price"
                placeholder="{{ __('dashboard/products.form.price.placeholder') }}" value="{{ old('price') }}"
                required />

            <x-dashboard::ui.input.select label="{{ __('dashboard/products.form.category.label') }}" name="category"
                :options="$options" :selected="old('category')" required />

            <x-dashboard::ui.input type="number" label="{{ __('dashboard/products.form.weight.label') }}"
                name="weight" placeholder="{{ __('dashboard/products.form.weight.placeholder') }}"
                value="{{ old('weight') }}" required />

            <x-dashboard::ui.input type="number" label="{{ __('dashboard/products.form.stock.label') }}"
                name="stock" placeholder="{{ __('dashboard/products.form.stock.placeholder') }}"
                value="{{ old('stock') }}" required />

            <x-dashboard::ui.input type="file" label="{{ __('dashboard/products.form.image.label') }}"
                name="image" />

            <div class="d-flex justify-content-end mb-5 mt-3">
                <x-dashboard::ui.button type="submit">
                    {{ __('dashboard/global.submit-btn') }}
                </x-dashboard::ui.button>
            </div>
        </form>

    </x-dashboard::shared.page-container>
</x-dashboard-layouts::main>
