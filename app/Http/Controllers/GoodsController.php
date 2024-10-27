<?php

namespace App\Http\Controllers;

use App\Http\Requests\GoodsRequest;
use App\Models\Category;
use App\Models\Goods;
use App\Models\Size;

class GoodsController extends Controller
{
    public function index()
    {
        $goods = Goods::withTrashed()->with('category', 'sizes')->get();

        return view('admin.goods.index', compact('goods'));
    }

    public function create()
    {
        $categories = Category::all();
        $sizes = Size::all();

        return view('admin.goods.create', compact('categories', 'sizes'));
    }

    public function store(GoodsRequest $request)
    {
        Goods::create($request->validated());

        return redirect()->route('admin.goods.index')->with('goods', 'created');
    }

    public function edit(Goods $goods)
    {
        $categories = Category::all();
        $sizes = Size::all();

        return view('admin.goods.edit', compact('categories', 'sizes', 'goods'));
    }

    public function update(GoodsRequest $request, Goods $goods)
    {
        $goods->update($request->validated());

        return redirect()->route('admin.goods.index')->with('goods', 'updated');
    }

    public function delete(Goods $goods)
    {
        $goods->delete();

        return redirect()->route('admin.goods.index')->with('goods', 'deleted');
    }

    public function restore(int $id)
    {
        Goods::onlyTrashed()->findOrFail($id)->restore();

        return redirect()->route('admin.goods.index')->with('goods', 'restored');
    }

    public function destroy(Goods $goods)
    {
        $goods->forceDelete();

        return redirect()->route('admin.goods.index')->with('goods', 'destroyed');
    }
}
