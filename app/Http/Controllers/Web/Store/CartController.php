<?php

namespace App\Http\Controllers\Web\Store;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Overtrue\LaravelShoppingCart\Cart;

class CartController extends Controller
{
    public function index()
    {
        return view('website.cart1');
    }

    public function add(Request $request, $slug)
    {
        $product = Product::query()->where('slug', $slug)->first();
        switch ($product) {
            case null:
                return abort(404);
        }
        $data = $request->validate(
            [
                'color' => 'required',
                'size' => 'required',
                'qty' => 'required|integer|min:1'
            ],
            [
                'color.required' => 'عذرا يجب اختيار لون المنتج',
                'size.required' => 'عذرا يجب اختيار حجم المنتج',
                'qty.required' => 'عذرا العدد مطلوب',
                'qty.min' => 'عذرا الحد الادني للعدد رقم 1',
                'qty.integer' => 'عذرا يجب ان يكون العدد رقم',
            ]);
        $row = \ShoppingCart::add($product->id, $product->name, $data['qty'], $product->discount != 0 ? $product->price - ( $product->price * ($product->discount / 100) ) :$product->price, ['color' => $data['color'], 'size' => $data['size']]);
        session()->flash('success', 'تم اضافة المنتج إلي العربة بنجاح');
        return back();
    }

    public function remove($id)
    {
        \ShoppingCart::remove($id);
        session()->flash('success', 'تم حذف المنتج من العربة بنجاح');
        return back();
    }
}
