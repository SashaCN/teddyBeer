<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\GoodsRequest;
use App\Models\Category;
use App\Models\Goods;
use App\Models\Size;
use Illuminate\Support\Facades\Storage;

class GoodsController extends Controller
{
    public function index()
    {
        $goods = Goods::withTrashed()->with('category', 'sizes')->orderBy('updated_at', 'desc')->paginate(25);

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
        $data = $request->validated();

        if (!isset($data['availability'])) {
            $data['availability'] = false;
        }

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('goods', 'public');
            $data['image'] = $imagePath;
        }

        $goods = Goods::create($request->validated());

        $goods->sizes()->sync($data['sizes']);

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
        $data = $request->validated();

        if (!isset($data['availability'])) {
            $data['availability'] = false;
        }

        if ($request->hasFile('image')) {
            if ($goods->image && $goods->image != 'goods/teddy_logo.png') {
                Storage::disk('public')->delete($goods->image);
            }

            $imagePath = $request->file('image')->store('goods', 'public');
            $data['image'] = $imagePath;
        }

        $goods->update($data);

        $goods->sizes()->sync($data['sizes']);

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
