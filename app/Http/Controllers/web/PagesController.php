<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Commercial;
use App\Models\Coupon;
use App\Models\Product;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function commercial()
    {
        $commercials = Commercial::query()->get();
        $coupons = Coupon::query()->latest()->take(12)->get();
        return view('website.commercial-coupons', compact('commercials', 'coupons'));
    }

    public function store()
    {
        $four_categories = Category::query()->latest()->take(4)->get();
        $categories = Category::query()->get();
        $latest_products = Product::query()->latest()->take(4)->get();
        $rand_products = Product::query()->inRandomOrder()->limit(5)->get();
        return view('website.store-index', compact('four_categories', 'categories', 'latest_products', 'rand_products'));
    }

    public function estate()
    {

    }
}
