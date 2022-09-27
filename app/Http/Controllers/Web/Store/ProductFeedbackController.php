<?php

namespace App\Http\Controllers\Web\Store;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Store\FeedbackProductRequest;
use App\Models\Product;
use App\Models\ProductFeedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductFeedbackController extends Controller
{
    public function store(FeedbackProductRequest $request, $slug)
    {
        $id = DB::table('products')->where('slug', $slug)->first();
        $product = Product::FindOrFail(isset($id) ? $id->id : null);
        ProductFeedback::create([
            'evaluate' => $request->evaluate,
            'comment' => $request->comment,
            'user_id' => auth()->id(),
            'product_id' => $product->id
        ]);
        session()->flash('success', 'تم تقييم المنتج بنجاح');
        return back();
    }
}
