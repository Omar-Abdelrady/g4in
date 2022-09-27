<?php

namespace App\Http\Controllers\Web\Store;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductFeedback;
use Illuminate\Http\Request;

class EvaluateController extends Controller
{
    public function store(Request $request, $slug)
    {
        $data = $request->validate([
            'comment' => 'required',
            'evaluate' => 'required|integer|max:5|min:1'
        ],
            [
                'comment.required' => 'يجب كتابة التعليق',
                'evaluate.required' => 'يجب اختيار التقييم',
                'evaluate.integer' => 'عذرا يجب ان يكون التقييم رقم',
                'evaluate.max' => 'عذرا يجب ان يكون اقصى حد للتقيم هو رقم 5',
                'evaluate.min' => 'عذرا يجب ان يكون ادنى حد للتقيم هو رقم 1',
            ]);
        $product = Product::query()->where('slug', $slug)->first();
        switch ($product) {
            case null:
                return abort(404);
                break;
        }
        ProductFeedback::query()->create([
            'evaluate' => $data['evaluate'],
            'comment' => $data['comment'],
            'product_id' => $product->id,
            'user_id' => auth()->guard('web')->id()
        ]);
        session()->flash('success', 'تم تقييم المنتج بنجاح');
        return back();
    }
}
