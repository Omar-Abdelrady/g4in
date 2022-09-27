<?php

namespace App\Http\Controllers\Web\Store;

use App\Http\Controllers\Controller;
use App\Mail\OrderShipped;
use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Http\Request;

class PaymentController extends Controller
{

    public function index()
    {
        if (\ShoppingCart::isEmpty()) {
            session()->flash('error', 'please try again later');
            return back();
        }
        $amount = round(\ShoppingCart::total());
        $url = "https://eu-test.oppwa.com/v1/checkouts";
        $data = "entityId=8a8294174b7ecb28014b9699220015ca" .
            "&amount=" . $amount .
            "&currency=EUR" .
            "&paymentType=DB";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Authorization:Bearer OGE4Mjk0MTc0YjdlY2IyODAxNGI5Njk5MjIwMDE1Y2N8c3k2S0pzVDg='));
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);// this should be set to true in production
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $responseData = curl_exec($ch);
        if (curl_errno($ch)) {
            return curl_error($ch);
        }
        curl_close($ch);
        $res = json_decode($responseData, true);
        return view('website.checkout', compact('res'));
    }

    public function shopper()
    {
        $id = \request()->input('id');

        $url = "https://eu-test.oppwa.com/v1/checkouts/$id/payment";
        $url .= "?entityId=8a8294174b7ecb28014b9699220015ca";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Authorization:Bearer OGE4Mjk0MTc0YjdlY2IyODAxNGI5Njk5MjIwMDE1Y2N8c3k2S0pzVDg='));
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);// this should be set to true in production
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $responseData = curl_exec($ch);
        if (curl_errno($ch)) {
            return curl_error($ch);
        }
        curl_close($ch);
        $res = json_decode($responseData, true);
        if (isset($res['amount'])) {
//            Status True
            $order = Order::query()->create([
                'user_id' => auth()->guard('web')->id(),
                'bank_transaction_id' => $res['id'],
            ]);
            foreach (\ShoppingCart::all() as $item) {
                OrderProduct::query()->create([
                    'qty' => $item->qty,
                    'size' => $item->size,
                    'color' => $item->color,
                    'product_id' => $item->id,
                    'order_id' => $order->id
                ]);
            }
            $deteils = [
                'username' => auth()->guard('web')->user()->first_name. ' '. auth()->guard('web')->user()->last_name,
                'order_id' => $order->id
            ];
            \Mail::to(config('app.email_support'))->send(new OrderShipped($deteils));
            session()->flash('success', 'تمت عملية الدفع بنجاح');
            \ShoppingCart::destroy();
            \ShoppingCart::clean();
            return redirect()->route('payment.status');
        } else {
            session()->flash('error', 'حدث خطأ ما يرجي المحاولة مره اخري');
            return back();
        }


        session()->flash('success', 'تمت عملية الدفع بنجاح');
        return redirect()->route('index');
    }
}
