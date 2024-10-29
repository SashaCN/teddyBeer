<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Goods;

class HomeController
{
    public function index ()
    {
        $categories = Category::all();
        $goods = Goods::orderBy('updated_at', 'desc')->paginate(20);

        return view('front.home', compact('categories', 'goods'));
    }
}
