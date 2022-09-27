<?php

namespace App\Http\Controllers\Admin\Estate;

use App\Http\Controllers\Controller;
use App\Models\AdCity;
use App\Models\Country;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $citys = AdCity::query()->paginate(10);
        return view('admin.pages.Estates.Citys.index', compact('citys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::query()->get();
        return view('admin.pages.Estates.Citys.create-edit', compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:200',
            'country_id' => 'required'
        ], [
            'name.required' => 'عذرا يجب ادخال الاسم',
            'name.max' => 'الحد الاقصى للحروف 200 حرف',
            'country_id' => 'يرجي اختيار الدولة التابع لها هذة المدينة'
        ]);
        AdCity::query()->create($request->all());
        session()->flash('success', 'تم اضافة المدينة بنجاح');
        return redirect()->route('admin.estates.citys.index');
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
        $city = AdCity::query()->findOrFail($id);
        $countries = Country::query()->get();
        return view('admin.pages.Estates.Citys.create-edit', compact('city', 'countries'));
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
        $request->validate([
            'name' => 'required|max:200',
            'country_id' => 'required'
        ], [
            'name.required' => 'عذرا يجب ادخال الاسم',
            'name.max' => 'الحد الاقصى للحروف 200 حرف',
            'country_id' => 'يرجي اختيار الدولة التابع لها هذة المدينة'
        ]);
        $city = AdCity::query()->findOrFail($id);
        $city->name = $request->name;
        $city->country_id = $request->country_id;
        $city->save();
        session()->flash('success', 'تم التعديل بنجاح');
        return redirect()->route('admin.estates.citys.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $city = AdCity::query()->findOrFail($id);
        $city->delete();
        session()->flash('success', 'تم الحذف بنجاح');
        return redirect()->route('admin.estates.citys.index');
    }
}
