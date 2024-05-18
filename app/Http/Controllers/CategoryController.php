<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        return view('dashboard.pages.category.index');
    }

    public function create()
    {
        return view('dashboard.pages.category.create');
    }

    public function store(StoreCategoryRequest $request)
    {
        Category::create($request->validated());

        toast(__('dashboard/categories.create.success-message'), 'success');

        return redirect()->route('dashboard.categories.index');
    }

    public function edit(Category $category)
    {
        return view('dashboard.pages.category.edit', [
            'category' => $category,
        ]);
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category->update($request->validated());

        toast(__('dashboard/categories.edit.success-message'), 'success');

        return redirect()->route('dashboard.categories.index');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        toast(__('dashboard/categories.delete.success-message'), 'success');

        return redirect()->route('dashboard.categories.index');
    }
}
