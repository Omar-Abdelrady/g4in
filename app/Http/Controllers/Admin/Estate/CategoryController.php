<?php

namespace App\Http\Controllers\Admin\Estate;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Estate\CategoryRequest;
use App\Models\AdCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = AdCategory::query()->paginate(10);
        return view('admin.pages.Estates.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.Estates.categories.create-edite');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        AdCategory::query()->create($request->all());
        session()->flash('success', 'تم اضافة القسم بنجاح');
        return redirect()->route('admin.estates.categories.index');
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
        $category = AdCategory::query()->findOrFail($id);
        return view('admin.pages.Estates.categories.create-edite', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        $category = AdCategory::query()->findOrFail($id);
        $category->name = $request->name;
        $category->sub_description = $request->sub_description;
        $category->keywords = $request->keywords;
        $category->save();
        session()->flash('success', 'ام التعديل بنجاح');
        return redirect()->route('admin.estates.categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = AdCategory::query()->findOrFail($id);
        $category->delete();
        session()->flash('success', 'تم حذ القسم بنجاح');
        return redirect()->route('admin.estates.categories.index');
    }
}
