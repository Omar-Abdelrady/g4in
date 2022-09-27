<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CouponRequest;
use App\Models\Coupon;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coupons = Coupon::query()->orderBy('exp_date', 'DESC')->paginate(10);
        return view('admin.pages.Coupon Section.index', compact('coupons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.Coupon Section.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CouponRequest $request)
    {
        $time = time();
        $ext = $request->image->getClientOriginalExtension();
        $fileName = $time.uniqid().'.'.$ext;
        $image = Image::make($request->image->getRealPath());
        $image->resize(150, 100);
        $image->save(public_path('storage/Images/Coupons/' . $fileName));
        Coupon::query()->create([
            'name' => $request->name,
            'description' => $request->description,
            'coupon' => $request->coupon,
            'exp_date' => $request->exp_date,
            'discount' => $request->discount,
            'image' => 'Images/Coupons/'.$fileName
        ]);
        session()->flash('success', 'تم اضافة الكوبون بنجاح');
        return redirect()->route('admin.store.coupons.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $coupon = Coupon::query()->findOrFail($id);
        return view('admin.pages.Coupon Section.show', compact('coupon'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $coupon = Coupon::query()->findOrFail($id);
        return view('admin.pages.Coupon Section.edit', compact('coupon'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CouponRequest $request, $id)
    {
        $coupon = Coupon::query()->findOrFail($id);
        if ($request->has('image'))
        {
            Storage::delete('/public/'. $coupon->image);
            $time = time();
            $ext = $request->image->getClientOriginalExtension();
            $fileName = $time.uniqid().'.'.$ext;
            $image = Image::make($request->image->getRealPath());
            $image->resize(150, 100);
            $image->save(public_path('storage/Images/Coupons/' . $fileName));
            $coupon->image = 'Images/Coupons/'. $fileName;
        }
        $coupon->name = $request->name;
        $coupon->description = $request->description;
        $coupon->discount = $request->discount;
        $coupon->coupon = $request->coupon;
        $coupon->exp_date = $request->exp_date;
        $coupon->save();
        session()->flash('success', 'تم التعديل علي الكوبون بنجاح');
        return redirect()->route('admin.store.coupons.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $coupon = Coupon::query()->findOrFail($id);
        Storage::delete('/public/'. $coupon->image);
        $coupon->delete();
        session()->flash('success', 'تم حذف الكوبون بنجاح');
        return back();
    }
}
