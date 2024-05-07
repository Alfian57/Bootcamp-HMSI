@extends('dashboard.layouts.main')

@section('content')
    <x-dashboard::shared.page-container title="Tambah Produk">

        <form action="{{ route('dashboard.produk.store') }}" method="post">
            @csrf
            <x-dashboard::ui.input type="text" label="Nama Produk" name="nama_barang" placeholder="Masukan nama barang" />

            <x-dashboard::ui.input type="text" label="Deskripsi Produk" name="deskripsi_produk"
                placeholder="Masukan deskripsi produk" />

            <x-dashboard::ui.input type="number" label="Harga Produk" name="harga_produk"
                placeholder="Masukan harga produk" />

            <x-dashboard::ui.input.select label="Kategori Produk" name="kategori_produk" :options="$kategoriOptions"
                selected='{{ old('kategori_produk') }}' />

            <x-dashboard::ui.input type="number" label="Berat Produk" name="berat_produk"
                placeholder="Masukan berat produk" />

            <x-dashboard::ui.input type="number" label="Stok Produk" name="stok_produk"
                placeholder="Masukan stok produk" />

            <x-dashboard::ui.input type="file" label="Gambar Produk" name="gambar_produk" />
        </form>

    </x-dashboard::shared.page-container>
@endsection
