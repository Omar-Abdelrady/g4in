<?php

namespace App\Http\Controllers\Web\Store;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function index()
    {
        return view('website.wishlist');
    }

    public function add($slug)
    {
        $product = Product::query()->where('slug', $slug)->first();
        switch ($product) {
            case null:
                return abort(404);
        }
        $price =  $product->discount != 0 ? $product->price - ( $product->price * ($product->discount / 100) ) : $product->price;
        \Cart::instance('wishlist')->add($product->id,$product->name,1, $price, ['slug' =>$product->slug, 'image'=>$product->photos[0]->image_avatar]);
        session()->flash('success', 'تم اضافة المنتج الي قائمو الامنيات');
        return back();
    }
    public function remove($id)
    {
        \Cart::instance('wishlist')->remove($id);
        session()->flash('success', 'تم حذف المنتج من قائمة الامنيات بنجاح');
        return back();
    }
}
