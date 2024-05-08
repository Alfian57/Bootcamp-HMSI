<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProdukRequest;
use App\Http\Requests\UpdateProdukRequest;
use App\Models\Produk;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    public function index()
    {
        return view('dashboard.pages.produk.index');
    }

    public function create()
    {
        return view('dashboard.pages.produk.create');
    }

    public function store(StoreProdukRequest $request)
    {
        $validatedData = $request->validated();
        if ($request->gambar_produk) {
            $validatedData['gambar_produk'] = $request->file('gambar_produk')->store('produk');
        }

        Produk::create($validatedData);
        toast('Produk berhasil ditambahkan', 'success');

        return redirect()->route('dashboard.produk.index');
    }

    public function show(Produk $produk)
    {
        //
    }

    public function edit(Produk $produk)
    {
        return view('dashboard.pages.produk.edit', [
            'produk' => $produk,
        ]);
    }

    public function update(UpdateProdukRequest $request, Produk $produk)
    {
        $validatedData = $request->validated();
        if ($request->gambar_produk) {
            if ($produk->gambar_produk) {
                Storage::delete($produk->gambar_produk);
            }

            $validatedData['gambar_produk'] = $request->file('gambar_produk')->store('produk');
        }

        Produk::create($validatedData);
        toast('Produk berhasil ditambahkan', 'success');

        return redirect()->route('dashboard.produk.index');
    }

    public function destroy(Produk $produk)
    {
        $produk->delete();
        toast('Produk berhasil dihapus', 'success');

        return redirect()->route('dashboard.produk.index');
    }
}
