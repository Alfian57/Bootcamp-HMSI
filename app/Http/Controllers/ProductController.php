<?php

namespace App\Http\Controllers;

use App\Enums\ProductCategory;
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
        return view('dashboard.pages.product.create', [
            'options' => [
                ProductCategory::ELECTRONIC->value => __('enum.product-category.electronic'),
                ProductCategory::COMPUTER->value => __('enum.product-category.computer'),
            ],
        ]);
    }

    public function store(StoreProdukRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['image'] = $this->handleImageUpload($request);

        Product::create($validatedData);
        toast(__('dashboard/products.create.success-message'), 'success');

        return redirect()->route('dashboard.products.index');
    }

    public function edit(Product $product)
    {
        return view('dashboard.pages.product.edit', [
            'product' => $product,
            'options' => [
                ProductCategory::ELECTRONIC->value => __('enum.product-category.electronic'),
                ProductCategory::COMPUTER->value => __('enum.product-category.computer'),
            ],
        ]);
    }

    public function update(UpdateProdukRequest $request, Product $product)
    {
        $validatedData = $request->validated();
        $validatedData['image'] = $this->handleImageUpload($request, $product);

        $product->update($validatedData);
        toast(__('dashboard/products.edit.success-message'), 'success');

        return redirect()->route('dashboard.products.index');
    }

    public function destroy(Product $product)
    {
        if ($product->image) {
            Storage::delete($product->image);
        }

        $product->delete();
        toast(__('dashboard/products.delete.success-message'), 'success');

        return redirect()->route('dashboard.products.index');
    }

    private function handleImageUpload($request, ?Product $product = null)
    {
        if ($request->hasFile('image')) {
            if ($product && $product->image) {
                Storage::delete($product->image);
            }

            return $request->file('image')->store('product');
        }

        return $product ? $product->image : null;
    }
}
