<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateServiceRequest;
use App\Http\Requests\Admin\UpdateServiceRequest;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::latest()->paginate(6);
        return view('admin.pages.Services Section.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.Services Section.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateServiceRequest $request)
    {

        $service = Service::create([
            'name' => $request->name,
            'description' => $request->description,
            'slug' => \Str::slug($request->name)
        ]);
        $service->addMedia($request->image)->toMediaCollection('service_image');
        foreach ($request->images as $image)
        {
            $service->addMedia($image)->toMediaCollection('service_images');
        }
        session()->flash('success', 'تم اضافة الخدمة بنجاح');
        return redirect()->route('admin.service.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $service = Service::query()->where('slug', $slug)->first();
        return view('admin.pages.Services Section.show', compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $service = Service::query()->where('slug', $slug)->first();
        return view('admin.pages.Services Section.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateServiceRequest $request, $slug)
    {
        $service_id = Service::query()->where('slug', $slug)->first();
        $service = Service::findOrFail($service_id->id ? $service_id->id : null);
        $service->name = $request->name;
        $service->slug = \Str::slug($request->name);
        $service->description = $request->description;
        if ($request->has('image'))
        {
            $service->getMedia('service_image')->first()->delete();
            $service->addMedia($request->image)->toMediaCollection('service_image');
        }
        if ($request->has('images'))
        {
            foreach ($service->getMedia('service_images') as $media){
                $media->delete();
            }
            foreach ($request->images as $image)
            {
                $service->addMedia($image)->toMediaCollection('service_images');
            }
        }
        $service->save();
        session()->flash('success', 'تم تعديل بيانات الخدمة بنجاح');
        return redirect()->route('admin.service.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        Storage::delete('/public/' . $service->logo);
        $service->delete();
        session()->flash('success', 'تم حذف الخدمة بنجاح');
        return back();
    }
}
