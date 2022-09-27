<?php

namespace App\Http\Controllers\Admin\Estate;

use App\Http\Controllers\Controller;
use App\Models\AdAttached;
use App\Models\AdCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class AttachedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attacheds = AdAttached::query()->paginate(10);
        return view('admin.pages.Estates.attacheds.index', compact('attacheds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.Estates.attacheds.create');
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
            'attached' => 'required|max:100',
        ],[
            'name.required' => 'يرجي كتابة الاسم',
            'name.max' => 'اكبر عدد لحروف الاسم 100 حرف',
            'icon.required' => 'الايكون مطلوبة'
        ]);
        if (!File::exists(public_path('storage/Ads/attachment/icon')))
        {
            File::makeDirectory(public_path('storage/Ads/attachment/icon'), 0777, true, true) ;
        }
        AdAttached::query()->create([
            'attached' => $request->attached,
            'icon' => $request->icon->store('Ads/attachment/icon', 'public')
        ]);
        session()->flash('success', 'تم اضافة المرفق بنجاح');
        return redirect()->route('admin.estates.attacheds.index');
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
        $attached = AdAttached::query()->findOrFail($id);
        Storage::delete('/public/'. $attached->icon);
        $attached->delete();
        session()->flash('success', 'تم حذف المرفق بنجاح');
        return back();
    }
}
