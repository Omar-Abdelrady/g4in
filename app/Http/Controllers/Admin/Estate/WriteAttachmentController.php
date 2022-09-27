<?php

namespace App\Http\Controllers\Admin\Estate;

use App\Http\Controllers\Controller;
use App\Models\AdCategory;
use App\Models\AdWriteAttachment;
use Illuminate\Http\Request;

class WriteAttachmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attachments = AdWriteAttachment::query()->paginate(10);
        return view('admin.pages.Estates.writeAttachments.index', compact('attachments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = AdCategory::query()->get();
        return view('admin.pages.Estates.writeAttachments.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['name' => 'required|max:100'],[
            'name.required' => 'عذرا الاسم مطلوب',
            'name.max' => 'اكبر عدد حروف للاسف 100 حرف',
        ]);
        AdWriteAttachment::query()->create($request->all());
        session()->flash('success', 'تم اضافة المرفق بنجاح');
        return redirect()->route('admin.estates.attachments.index');
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
        AdWriteAttachment::query()->findOrFail($id)->delete();
        session()->flash('success', 'تم حذف المرفق بنجاح');
        return back();
    }
}
