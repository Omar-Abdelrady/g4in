<?php

namespace App\Http\Controllers\Admin\Store;

use App\Http\Controllers\Controller;
use App\Models\ProductSize;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sizes = ProductSize::latest()->paginate(6);
        return view('admin.pages.Store Section.Size.index', compact('sizes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.Store Section.Size.create-and-edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->validate([
            'name' => 'required'
        ]);
        ProductSize::create(['name'=>$name['name']]);
        session()->flash('success', 'تم اضافة المقاس بنجاح');
        return redirect()->route('admin.store.sizes.index');
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
        $size = ProductSize::findOrFail($id);
        return view('admin.pages.Store Section.Size.create-and-edit', compact('size'));
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
        $name = $request->validate(['name'=>'required']);
        $size = ProductSize::findOrFail($id);
        $size->name = $name['name'];
        $size->save();
        session()->flash('success', 'تم التعديل بنجاح');
        return redirect()->route('admin.store.sizes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $size = ProductSize::findOrFail($id);
        $size->delete();
        session()->flash('success', 'تم حذف المقاس');
        return redirect()->route('admin.store.sizes.index');
    }
}
