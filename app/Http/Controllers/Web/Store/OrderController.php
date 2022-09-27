<?php

namespace App\Http\Controllers\Web\Store;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Store\StoreOrderRequest;
use App\Models\OrderInformation;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(StoreOrderRequest $request)
    {
        $request->request->add(['user_id' => auth()->guard('web')->id()]);
        OrderInformation::query()->create($request->all());
        session()->flash('success', 'تم اضافة عنوان الفاتورة بنجاح يمكنك الان اتمام عملية الشراء');
        return back();
    }
    public function update(StoreOrderRequest $request){
        $request->request->add(['user_id'=>auth()->guard('web')->id()]);
        auth()->guard('web')->user()->order_information()->delete();
        OrderInformation::query()->create($request->all());
        session()->flash('success', 'تم التعديل علي عنوان الفاتورة بنجاح يمكنك الان اتمام عملية الشراء');
        return back();
    }
}
