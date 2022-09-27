<?php

namespace App\Http\Controllers\Admin\Estate;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Estate\CreateOrUpdateAgentsRequest;
use App\Models\AdAgent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class AgentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agents = AdAgent::query()->paginate(10);
        return view('admin.pages.Estates.agents.index', compact('agents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.Estates.agents.create-update');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateOrUpdateAgentsRequest $request)
    {
        $time = time();
        $fileName = $request->image->getClientOriginalName();
        $image = Image::make($request->image->getRealPath());
        $image->resize(100,100);
        if (!File::exists(public_path('storage/Images/agents/')))
        {
            File::makeDirectory(public_path('storage/Images/agents/'), 0777, true, true) ;
        }
        $image->save(public_path('storage/Images/agents/'. $time. $fileName));
        AdAgent::query()->create([
            'name' => $request->name,
            'rate' => $request->rate,
            'description' => $request->description,
            'email' => $request->email,
            'city' => $request->city,
            'phone' => $request->phone,
            'image' => 'Images/agents/'.$time. $fileName
        ]);
        session()->flash('success', 'تم اضافة الوكيل بنجاح');
        return redirect()->route('admin.estates.agents.index');
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
        $agent = AdAgent::query()->findOrFail($id);
        return view('admin.pages.Estates.agents.create-update', compact('agent'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateOrUpdateAgentsRequest $request, $id)
    {
        $agent = AdAgent::query()->findOrFail($id);
        $agent->name = $request->name;
        $agent->email = $request->email;
        $agent->phone = $request->phone;
        $agent->description = $request->description;

        $agent->city = $request->city;
        $agent->rate = $request->rate;
        if ($request->has('image'))
        {
            $time = time();
            Storage::delete('/public/'. $agent->image);
            $fileName = $request->image->getClientOriginalName();
            $image = Image::make($request->image->getRealPath());
            $image->resize(100,100);
            $image->save(public_path('storage/Images/agents/'. $time. $fileName));
            $agent->image = 'Images/agents/'.$time. $fileName;
        }
        $agent->save();
        session()->flash('success', 'تم معلومات الوكيل بنجاح');
        return redirect()->route('admin.estates.agents.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $agent = AdAgent::query()->findOrFail($id);
        Storage::delete('/public/'. $agent->image);
        $agent->delete();
        session()->flash('success', 'تم حذف الوكيل بنجاح');
        return redirect()->route('admin.estates.agents.index');
    }
}
