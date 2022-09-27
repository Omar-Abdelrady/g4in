<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PartnerControoler extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partners = Partner::query()->get();
        return view('admin.pages.Partner.index', compact('partners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.Partner.create-edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'logo' => 'required'
        ], [
            'name.required' => 'عذرا هذا يجب كتابة الاسم',
            'logo.required' => 'عذرا يجب اختيار لوجو'
        ]);

        $time = time();
        $file_name = $request->logo->getClientOriginalName();
        $image = Image::make($request->logo->getRealPath());
        $image->resize(200, 50);
        $image->save(public_path('storage/Images/Partners/' . $time . $file_name));
        Partner::query()->create([
            'name' => $request->name,
            'image' => 'Images/Partners/' . $time . $file_name,
            'logo' => 'Images/Partners/' . $time . $file_name
        ]);
        session()->flash('success', 'تم اضافة شريك بنجاح');
        return redirect()->route('admin.partner.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $partner = Partner::query()->findOrFail($id);
        \Storage::delete('/public/' . $partner->logo);
        $partner->delete();
        session()->flash('success', 'تم حذف الشريك بنجاح');
        return back();
    }
}
