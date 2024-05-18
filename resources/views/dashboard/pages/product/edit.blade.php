@section('title')
    {{ __('dashboard/products.edit.title') }}
@endsection

<x-dashboard-layouts::main>
    <x-dashboard::shared.page-container title="{{ __('dashboard/products.edit.page-title') }} {{ $product->name }}">

        <form action="{{ route('dashboard.products.update', $product->slug) }}" method="post"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <x-dashboard::ui.input type="text" label="{{ __('dashboard/products.form.name.label') }}" name="name"
                placeholder="{{ __('dashboard/products.form.name.placeholder') }}"
                value="{{ old('name', $product->name) }}" required />

            <x-dashboard::ui.input.text-area label="{{ __('dashboard/products.form.description.label') }}"
                name="description" placeholder="{{ __('dashboard/products.form.description.placeholder') }}"
                value="{{ old('description', $product->description) }}" required />

            <x-dashboard::ui.input type="number" label="{{ __('dashboard/products.form.price.label') }}"
                name="price" placeholder="{{ __('dashboard/products.form.price.placeholder') }}"
                value="{{ old('price', $product->price) }}" required />

            <x-dashboard::ui.input.select label="{{ __('dashboard/products.form.category.label') }}" name="category_id"
                :options="$categoryOptions" :selected="old('category_id', $product->category_id)" required />

            <x-dashboard::ui.input type="number" label="{{ __('dashboard/products.form.weight.label') }}"
                name="weight" placeholder="{{ __('dashboard/products.form.weight.placeholder') }}"
                value="{{ old('weight', $product->weight) }}" required />

            <x-dashboard::ui.input type="number" label="{{ __('dashboard/products.form.stock.label') }}"
                name="stock" placeholder="{{ __('dashboard/products.form.stock.placeholder') }}"
                value="{{ old('stock', $product->stock) }}" required />

            <x-dashboard::ui.input type="file" label="{{ __('dashboard/products.form.image.label') }}"
                name="image">
                <x-slot name="body">
                    <br>
                    <img src="{{ asset('storage/' . $product->image) }}"
                        alt="{{ __('dashboard/global.image-error') }}" class="img-fluid mt-3 text-danger"
                        style="max-height: 200px;">
                </x-slot>
            </x-dashboard::ui.input>

            <p class="text-info">{{ __('dashboard/products.edit.form-info') }}</p>

            <div class="d-flex justify-content-end mb-5 mt-3">
                <x-dashboard::ui.button type="submit">
                    {{ __('dashboard/global.submit-btn') }}
                </x-dashboard::ui.button>
            </div>
        </form>

    </x-dashboard::shared.page-container>
</x-dashboard-layouts::main>
