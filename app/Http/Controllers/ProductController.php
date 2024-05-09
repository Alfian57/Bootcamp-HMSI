<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProdukRequest;
use App\Http\Requests\UpdateProdukRequest;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        return view('dashboard.pages.product.index');
    }

    public function create()
    {
        return view('dashboard.pages.product.create');
    }

    public function store(StoreProdukRequest $request)
    {
        $validatedData = $request->validated();
        if ($request->image) {
            $validatedData['image'] = $request->file('image')->store('produk');
        }

        Product::create($validatedData);
        toast('Produk berhasil ditambahkan', 'success');

        return redirect()->route('dashboard.products.index');
    }

    public function show(Product $produk)
    {
        //
    }

    public function edit(Product $product)
    {
        return view('dashboard.pages.product.edit', [
            'product' => $product,
        ]);
    }

    public function update(UpdateProdukRequest $request, Product $product)
    {
        $validatedData = $request->validated();
        if ($request->image) {
            if ($product->image) {
                Storage::delete($product->image);
            }

            $validatedData['image'] = $request->file('image')->store('produk');
        }

        $product->update($validatedData);
        toast('Produk berhasil diubah', 'success');

        return redirect()->route('dashboard.products.index');
    }

    public function destroy(Product $product)
    {
        if ($product->image) {
            Storage::delete($product->image);
        }

        $product->delete();
        toast('Produk berhasil dihapus', 'success');

        return redirect()->route('dashboard.products.index');
    }
}