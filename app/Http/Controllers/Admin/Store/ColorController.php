<?php

namespace App\Http\Controllers\Admin\Store;

use App\Http\Controllers\Controller;
use App\Models\ProductColor;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $colors = ProductColor::latest()->paginate(6);;
        return view('admin.pages.Store Section.Color.index', compact('colors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.Store Section.Color.create-and-edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'color' => 'required'
        ]);
        ProductColor::create($data);
        session()->flash('success', 'تم اضافة اللون بنجاح');
        return redirect()->route('admin.store.colors.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $color = ProductColor::findOrFail($id);
        return view('admin.pages.Store Section.Color.create-and-edit', compact('color'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required',
            'color' => 'required'
        ]);
        $color = ProductColor::findOrFail($id);
        $color->name = $data['name'];
        $color->color = $data['color'];
        $color->save();
        session()->flash('success', 'تم التعديل بنجاح');
        return redirect()->route('admin.store.colors.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $color = ProductColor::findOrFail($id);
        $color->delete();
        session()->flash('success', 'تم الحذف بنجاح');
        return redirect()->route('admin.store.colors.index');
    }
}
