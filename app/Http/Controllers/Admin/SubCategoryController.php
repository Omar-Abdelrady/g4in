<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdCategory;
use App\Models\AdSubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sub_categories = AdSubCategory::query()->paginate(10);
        return view('admin.pages.Estates.categories.sub-category.index', compact('sub_categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = AdCategory::query()->get();
        return view('admin.pages.Estates.categories.sub-category.create', compact('categories'));
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
            'category_id' => 'required'
        ]);
        AdSubCategory::query()->create([
            'name' => $request->name,
            'ad_category_id' => $request->category_id
        ]);
        session()->flash('success', 'تم اضافة القسم بنجاح');
        return redirect()->route('admin.estates.sub-category.index');
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
        $sub_category = AdSubCategory::query()->findOrFail($id);
        $categories = AdCategory::query()->get();
        return view('admin.pages.Estates.categories.sub-category.create', compact('sub_category', 'categories'));
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
        $request->validate([
            'name' => 'required',
            'category_id' => 'required'
        ]);
        $sub_category = AdSubCategory::query()->findOrFail($id);
        $sub_category->name = $request->name;
        $sub_category->ad_category_id = $request->category_id;
        $sub_category->save();
        session()->flash('success', 'تم التعديل بنجاح');
        return redirect()->route('admin.estates.sub-category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sub_category = AdSubCategory::query()->findOrFail($id);
        $sub_category->delete();
        session()->flash('success', 'تم حذف بنجاح');
        return redirect()->route('admin.estates.sub-category.index');
    }
}
