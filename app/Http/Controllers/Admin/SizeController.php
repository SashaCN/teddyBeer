<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SizeRequest;
use App\Models\Size;

class SizeController extends Controller
{
    public function index()
    {
        $sizes = Size::withTrashed()->get();

        return view('admin.sizes.index', compact('sizes'));
    }

    public function create()
    {
        return view('admin.sizes.create');
    }

    public function store(SizeRequest $request)
    {
        Size::create($request->validated());

        return redirect()->route('admin.sizes.index')->with('size', 'created');
    }

    public function edit(Size $size)
    {
        return view('admin.sizes.edit', compact('size'));
    }

    public function update(SizeRequest $request, Size $size)
    {
        $size->update($request->validated());

        return redirect()->route('admin.sizes.index')->with('size', 'updated');
    }

    public function delete(Size $size)
    {
        $size->delete();

        return redirect()->route('admin.sizes.index')->with('size', 'deleted');
    }

    public function restore(int $id)
    {
        Size::onlyTrashed()->findOrFail($id)->restore();

        return redirect()->route('admin.sizes.index')->with('size', 'restored');
    }

    public function destroy(Size $size)
    {
        $size->forceDelete();

        return redirect()->route('admin.sizes.index')->with('size', 'destroyed');
    }
}
