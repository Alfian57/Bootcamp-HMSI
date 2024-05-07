<?php

namespace App\Http\Controllers;

use App\Enums\KategoriProduk;
use App\Http\Requests\StoreProdukRequest;
use App\Http\Requests\UpdateProdukRequest;
use App\Models\Produk;

class ProdukController extends Controller
{
    public function index()
    {
        return view('dashboard.pages.produk.index', [
            'title' => 'Kelola Produk',
        ]);
    }

    public function create()
    {
        return view('dashboard.pages.produk.create', [
            'title' => 'Tambah Produk',
            "kategoriOptions" => [
                KategoriProduk::ELEKTRONIK->value => "Elektronik",
                KategoriProduk::KOMPUTER->value => "Komputer",
            ]
        ]);
    }

    public function store(StoreProdukRequest $request)
    {
        //
    }

    public function show(Produk $produk)
    {
        //
    }

    public function edit(Produk $produk)
    {
        //
    }

    public function update(UpdateProdukRequest $request, Produk $produk)
    {
        //
    }

    public function destroy(Produk $produk)
    {
        //
    }
}
