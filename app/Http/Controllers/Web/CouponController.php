<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\UserCoupon;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Mail\CouponMail;

class CouponController extends Controller
{
    public function index()
    {
        $coupons = Coupon::query()->whereDate('exp_date', '>', Carbon::today())->paginate(12);
        return view('website.coupons', compact('coupons'));
    }

    public function get($id)
    {
        $coupon = Coupon::query()->findOrFail($id);
        if (Carbon::parse($coupon->exp_date)->isPast())
        {
            session()->flash('error', 'عذرا لقد انتهت صلاحية الكوبون');
            return redirect()->route('coupon.index');
        }
        $is_exist = UserCoupon::query()->where('user_id', auth()->guard('web')->id())->where('coupon_id', $coupon->id)->first();
        if ($is_exist == null) {
            UserCoupon::query()->create([
                'user_id' => auth()->guard('web')->id(),
                'coupon_id' => $coupon->id
            ]);
            $details = $coupon;
            \Mail::to(auth()->guard('web')->user()->email)->send(new CouponMail($details));
            session()->flash('success', 'تم ارسال الكوبون تحقق من بريدك');
            return redirect()->route('coupon.index');
        } else {
            session()->flash('error', 'عذرا لا يمكن ارسال الكوبون مرتين');
            return redirect()->route('coupon.index');
        }

    }

    public function search(Request $request)
    {
        $request->validate(['search' => 'required'],['search.required' => 'عذرا يجب كتابة كلمة البحث']);
        $coupons = Coupon::query()->where('name', 'LIKE', "%{$request->search}%")->whereDate('exp_date', '>', Carbon::today())->paginate(10);
        return view('website.coupons', compact('coupons'));
    }
}
