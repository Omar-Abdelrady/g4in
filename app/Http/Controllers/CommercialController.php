<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCommercialRequest;
use App\Models\Commercial;
use App\Models\CommercialAttachment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class CommercialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $commercials = Commercial::query()->paginate(10);
        return view('admin.pages.Coupon Section.commercial.index', compact('commercials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.Coupon Section.commercial.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCommercialRequest $request)
    {
        $time = time();
        $ext = $request->image->getClientOriginalExtension();
        $fileName = $time.uniqid().'.'.$ext;
        $image = Image::make($request->image->getRealPath());
        $image->resize(350, 350);
        $image->save(public_path('storage/Images/Commercials/' . $fileName));
        $commercial = Commercial::query()->create([
            'name' => $request->name,
            'description' => $request->description,
            'sub_description' => $request->sub_description,
            'slug' => Str::slug($request->name),
            'image' => 'Images/Commercials/' . $fileName
        ]);
        if ($request->has('file')) {
        CommercialAttachment::query()->create([
            'pdf_name' => $request->file->store('commercial/attachments', 'public'),
            'commercial_id' => $commercial->id
        ]);
        }
        session()->flash('success', 'تم ضافة الاعلان بنجاح');
        return redirect()->route('admin.commercial.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $commercial = Commercial::query()->findOrFail($id);
        return view('admin.pages.Coupon Section.commercial.show', compact('commercial'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $commercial = Commercial::query()->findOrFail($id);
        return view('admin.pages.Coupon Section.commercial.update', compact('commercial'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateCommercialRequest $request, $id)
    {
        $commercial = Commercial::query()->findOrFail($id);
        $commercial->name = $request->name;
        $commercial->sub_description = $request->sub_description;
        $commercial->description = $request->description;
        if ($request->has('image'))
        {
            Storage::delete('/public/'. $commercial->image);;
            $time = time();
            $ext = $request->image->getClientOriginalExtension();
            $fileName = $time.uniqid().'.'.$ext;
            $image = Image::make($request->image->getRealPath());
            $image->resize(350, 350);
            $image->save(public_path('storage/Images/Commercials/' . $fileName));
            $commercial->image = 'Images/Commercials/' . $fileName;
        }
        if ($request->has('file'))
        {
            \Storage::delete('/public/'.$commercial->attachment->pdf_name);
            $commercial->attachment->pdf_name = $request->file->store('commercial/attachments', 'public');
            $commercial->attachment->save();
        }
        $commercial->save();
        return redirect()->route('admin.commercial.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $commercial = Commercial::query()->findOrFail($id);
        Storage::delete('/public/'. $commercial->attachment->file_name);
        Storage::delete('/public/'. $commercial->image);
        $commercial->delete();
        session()->flash('success', 'تم حذف الاعلان بنجاح!');
        return back();
    }
}
