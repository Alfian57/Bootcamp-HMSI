@section('title')
    Tambah Produk
@endsection

<x-dashboard-layouts::main>
    <x-dashboard::shared.page-container title="Tambah Produk">

        <form action="{{ route('dashboard.products.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <x-dashboard::ui.input type="text" label="Nama Produk" name="name" placeholder="Masukan nama produk"
                value="{{ old('name') }}" required autofocus />

            <x-dashboard::ui.input.text-area label="Deskripsi Produk" name="description"
                placeholder="Masukan deskripsi produk" value="{{ old('description') }}" required />

            <x-dashboard::ui.input type="number" label="Harga Produk" name="price" placeholder="Masukan harga produk"
                value="{{ old('price') }}" required />

            <x-dashboard::ui.input.select label="Kategori Produk" name="category" :options="[
                \App\Enums\ProductCategory::ELECTRONIC->value => 'Elektronik',
                \App\Enums\ProductCategory::COMPUTER->value => 'Komputer',
            ]" :selected="old('category')"
                required />

            <x-dashboard::ui.input type="number" label="Berat Produk" name="weight" placeholder="Masukan berat produk"
                value="{{ old('weight') }}" required />

            <x-dashboard::ui.input type="number" label="Stok Produk" name="stock" placeholder="Masukan stok produk"
                value="{{ old('stock') }}" required />

            <x-dashboard::ui.input type="file" label="Gambar Produk" name="image" />

            <div class="d-flex justify-content-end mb-5 mt-3">
                <x-dashboard::ui.button type="submit">
                    Kirim
                </x-dashboard::ui.button>
            </div>
        </form>

    </x-dashboard::shared.page-container>
</x-dashboard-layouts::main>
