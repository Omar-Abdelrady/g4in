<?php

namespace App\Http\Controllers\Web\Store;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index()
    {
        $products = Product::query()->paginate(10);
        $categories = Category::query()->get();
        return view('website.products', compact('products', 'categories'));
    }
    public function category($slug)
    {
        $category = Category::query()->where('slug', $slug)->with('products')->first();
        switch ($category)
        {
            case null:
                return abort(404);
                break;
        }
        $categories = Category::query()->get();
        $products = $category->products()->paginate(2);
        return view('website.products', compact('categories', 'products', 'category'));
    }
}
