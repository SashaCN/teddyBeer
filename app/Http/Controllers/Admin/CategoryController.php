<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::withTrashed()->get();

        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(CategoryRequest $request)
    {
        Category::create($request->validated());

        return redirect()->route('admin.categories.index')->with('category', 'created');
    }

    public function show(Category $category)
    {
        return redirect()->route('admin.categories.edit');
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }


    public function update(CategoryRequest $request, Category $category)
    {
        $category->update($request->validated());

        return redirect()->route('admin.categories.index')->with('category', 'updated');
    }

    public function delete(Category $category)
    {
        $category->delete();

        return redirect()->route('admin.categories.index')->with('category', 'deleted');
    }

    public function restore(int $id)
    {
        Category::onlyTrashed()->findOrFail($id)->restore();

        return redirect()->route('admin.categories.index')->with('category', 'restored');
    }

    public function destroy(Category $catetory)
    {
        $catetory->forceDelete();

        return redirect()->route('admin.categories.index')->with('category', 'destroyed');
    }
}
