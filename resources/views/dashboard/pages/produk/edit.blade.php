@section('title')
    Ubah Produk
@endsection

<x-dashboard-layouts::main>
    <x-dashboard::shared.page-container title="Ubah Produk {{ $produk->nama_produk }}">

        <form action="{{ route('dashboard.produk.update', $produk->id_produk) }}" method="post"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <x-dashboard::ui.input type="text" label="Nama Produk" name="nama_produk" placeholder="Masukan nama produk"
                value="{{ old('nama_produk', $produk->nama_produk) }}" required autofocus />

            <x-dashboard::ui.input.text-area label="Deskripsi Produk" name="deskripsi_produk"
                placeholder="Masukan deskripsi produk" value="{{ old('deskripsi_produk', $produk->deskripsi_produk) }}"
                required />

            <x-dashboard::ui.input type="number" label="Harga Produk" name="harga_produk"
                placeholder="Masukan harga produk" value="{{ old('harga_produk', $produk->harga_produk) }}" required />

            <x-dashboard::ui.input.select label="Kategori Produk" name="kategori_produk" :options="[
                \App\Enums\KategoriProduk::ELEKTRONIK->value => 'Elektronik',
                \App\Enums\KategoriProduk::KOMPUTER->value => 'Komputer',
            ]"
                :selected="old('kategori_produk')" required />

            <x-dashboard::ui.input type="number" label="Berat Produk" name="berat_produk"
                placeholder="Masukan berat produk" value="{{ old('berat_produk', $produk->berat_produk) }}" required />

            <x-dashboard::ui.input type="number" label="Stok Produk" name="stok_produk"
                placeholder="Masukan stok produk" value="{{ old('stok_produk', $produk->stok_produk) }}" required />

            <x-dashboard::ui.input type="file" label="Gambar Produk" name="gambar_produk" />

            <div class="d-flex justify-content-end mb-5 mt-3">
                <x-dashboard::ui.button type="submit">
                    Kirim
                </x-dashboard::ui.button>
            </div>
        </form>

    </x-dashboard::shared.page-container>
</x-dashboard-layouts::main>
