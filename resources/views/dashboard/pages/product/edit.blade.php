@section('title')
    Ubah Produk
@endsection

<x-dashboard-layouts::main>
    <x-dashboard::shared.page-container title="Ubah Produk {{ $product->name }}">

        <form action="{{ route('dashboard.products.update', $product->slug) }}" method="post"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <x-dashboard::ui.input type="text" label="Nama Produk" name="name" placeholder="Masukan nama produk"
                value="{{ old('name', $product->name) }}" required autofocus />

            <x-dashboard::ui.input.text-area label="Deskripsi Produk" name="description"
                placeholder="Masukan deskripsi produk" value="{{ old('description', $product->description) }}"
                required />

            <x-dashboard::ui.input type="number" label="Harga Produk" name="price" placeholder="Masukan harga produk"
                value="{{ old('price', $product->price) }}" required />

            <x-dashboard::ui.input.select label="Kategori Produk" name="category" :options="[
                \App\Enums\ProductCategory::ELECTRONIC->value => 'Elektronik',
                \App\Enums\ProductCategory::COMPUTER->value => 'Komputer',
            ]" :selected="old('category', $product->category)"
                required />

            <x-dashboard::ui.input type="number" label="Berat Produk" name="weight" placeholder="Masukan berat produk"
                value="{{ old('weight', $product->weight) }}" required />

            <x-dashboard::ui.input type="number" label="Stok Produk" name="stock" placeholder="Masukan stok produk"
                value="{{ old('stock', $product->stock) }}" required />

            <x-dashboard::ui.input type="file" label="Gambar Produk" name="image">
                <x-slot name="body">
                    <br>
                    <img src="{{ asset('storage/' . $product->image) }}" alt="Gambar rusak atau kosong"
                        class="img-fluid mt-3 text-danger" style="max-height: 200px;">
                </x-slot>
            </x-dashboard::ui.input>

            <p class="text-info">Masukan gambar jika ingin mengubahnya dan biarkan kosong jika tidak ingin mengubah</p>

            <div class="d-flex justify-content-end mb-5 mt-3">
                <x-dashboard::ui.button type="submit">
                    Kirim
                </x-dashboard::ui.button>
            </div>
        </form>

    </x-dashboard::shared.page-container>
</x-dashboard-layouts::main>
