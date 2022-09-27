<?php

namespace App\Http\Controllers\Admin\Estate;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Estate\CreateAdRequest;
use App\Models\Ad;
use App\Models\AdAttached;
use App\Models\AdCategory;
use App\Models\AdPhoto;
use App\Models\AdSpecification;
use App\Models\Chart;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class AdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ads = Ad::query()->orderBy('ad_status')->get();
        return view('admin.pages.Estates.ads.index', compact('ads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = AdCategory::query()->get();
        $countries = Country::query()->get();
        $attachments = AdAttached::query()->get();
        return view('admin.pages.Estates.ads.create', compact('categories', 'countries', 'attachments'));
    }

    public function status($id)
    {
        $ad = Ad::query()->findOrFail($id);
        if ($ad->ad_status == 0)
        {
            $ad->ad_status = 1;
            $ad->save();
            session()->flash('success', 'تم تفعيل الاعلان بنجاح');
            return back();
        }
        $ad->ad_status = 0;
        $ad->save();
        session()->flash('success', 'تم الغاء تفعيل الاعلان بنجاح');
        return back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateAdRequest $request)
    {
        $ad = new Ad();
        $ad->title = $request->title;
        $ad->advertiser_name = $request->advertiser_name;
        $ad->description = $request->description;
        $ad->short_description = $request->short_description;
        $ad->price = $request->price;
        $ad->space = $request->space;
        $ad->ad_code = $request->ad_code;
        $ad->num_of_rooms = $request->num_of_rooms;
        $ad->num_of_kitchens = $request->num_of_kitchens;
        $ad->num_of_toilets = $request->num_of_toilets;
        $ad->num_of_floors = $request->num_of_floors;
        $ad->num_of_apartments = $request->num_of_apartments;
        $ad->num_of_shops = $request->num_of_shops;
        $ad->block_num = $request->block_num;
        $ad->place_num = $request->place_num;
        $ad->address = $request->address;
        $ad->phone = $request->phone;
        $ad->second_phone = $request->second_phone;
        $ad->sale_or_rent = $request->sale_or_rent;
        $ad->advertiser_email = $request->advertiser_email;
        $ad->category_id = $request->category_id;
        $ad->sub_category_id = $request->sub_category_id ?? null;
        $ad->ad_agent_id = $request->ad_agent_id;
        $ad->city_id = $request->city_id;
        $ad->slug = \Str::slug($request->title);
        $ad->user_id = null;
        $ad->admin_id = auth()->guard('admin')->id();
        $ad->save();
        $ad->slug = Str::slug($request->title.$ad->id);
        $ad->save();
        $ad->attachments()->sync($request->attachments);

        if ($request->has('chart_photo') || $request->has('chart_pdf') || $request->has('chart_video') || $request->chart_description)
        {
            Chart::query()->create([
                'photo' => $request->has('chart_photo') ? $request->chart_photo->store('Ads/charts/photos', 'public') : null,
                'pdf' => $request->has('chart_pdf') ? $request->chart_pdf->store('Ads/charts/pdfs', 'public') : null,
                'video' => $request->has('chart_video') ? $request->chart_video->store('Ads/charts/videos', 'public') : null,
                'description' => $request->chart_description ?: null,
                'ad_id' => $ad->id
            ]);
        }

        if ($request->has('chart_specifications')) {
            foreach ($request->chart_specifications as $item) {
                AdSpecification::query()->create([
                    'key' => $item['key'],
                    'value' => $item['value'],
                    'is_chart' => 1,
                    'ad_id' => $ad->id
                ]);
            }
        }

        if ($request->has('images')) {
            foreach ($request->images as $image) {
                if (!File::exists(public_path('storage/Images/Ad-Images/')))
                {
                   File::makeDirectory(public_path('storage/Images/Ad-Images/'), 0777, true, true) ;
                }
                $time = time();
                $fileName = $image->getClientOriginalName();

                $image_original = \Intervention\Image\Facades\Image::make($image->getRealPath());
                $image_original->resize(500, 500);
                $image_original->save(public_path('storage/Images/Ad-Images/' . $time . $fileName));

                $image_medium = Image::make($image->getRealPath());
                $image_medium->resize(350, 350);
                $image_medium->save(public_path('storage/Images/Ad-Images/' . $time . 'medium' . $fileName));

                $image_avatar = Image::make($image->getRealPath());
                $image_avatar->resize('100', '100');
                $image_avatar->save(public_path('storage/Images/Ad-Images/' . $time . 'avatar' . $fileName));

                AdPhoto::create([
                    'image' => 'Images/Ad-Images/' . $time . $fileName,
                    'image_medium' => 'Images/Ad-Images/' . $time . 'medium' . $fileName,
                    'image_avatar' => 'Images/Ad-Images/' . $time . 'avatar' . $fileName,
                    'ad_id' => $ad->id
                ]);
            }
        }

        // if (!empty($ad->specifications[0]))
        // {
        //     if (!$request->has('key'))
        //     {
        //         $ad->specifications()->delete();
        //     }
        // }
        if ($request->has('specifications')) {
            // $ad->specifications()->delete();
            foreach ($request->specifications as $item) {
                AdSpecification::query()->create([
                    'key' => $item['key'],
                    'value' => $item['value'],
                    'ad_id' => $ad->id
                ]);
            }
        }

        session()->flash('success', 'تم اضافة الاعلان بنجاح');
        return redirect(route('admin.estates.ads.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ad = Ad::query()->findOrFail($id);
        return view('admin.pages.Estates.ads.show', compact('ad'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ad = Ad::query()->findOrFail($id);
        $categories = AdCategory::query()->get();
        $countries = Country::query()->get();
        $attachments = AdAttached::query()->get();
        $specifications = $ad->specifications;
        $general_specifications = [];
        $chart_specifications = [];
        foreach ($specifications as $item) {
            if ($item->is_chart)
                $chart_specifications[] = $item;
            else
                $general_specifications[] = $item;
        }
        return view('admin.pages.Estates.ads.edit', compact('ad', 'categories', 'countries', 'attachments', 'general_specifications', 'chart_specifications'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateAdRequest $request, $id)
    {
        $ad = Ad::query()->findOrFail($id);
        $ad->title = $request->title;
        $ad->advertiser_name = $request->advertiser_name;
        $ad->description = $request->description;
        $ad->short_description = $request->short_description;
        $ad->price = $request->price;
        $ad->space = $request->space;
        $ad->ad_code = $request->ad_code;
        $ad->num_of_rooms = $request->num_of_rooms;
        $ad->num_of_kitchens = $request->num_of_kitchens;
        $ad->num_of_toilets = $request->num_of_toilets;
        $ad->num_of_floors = $request->num_of_floors;
        $ad->num_of_apartments = $request->num_of_apartments;
        $ad->num_of_shops = $request->num_of_shops;
        $ad->block_num = $request->block_num;
        $ad->place_num = $request->place_num;
        $ad->address = $request->address;
        $ad->phone = $request->phone;
        $ad->second_phone = $request->second_phone;
        $ad->sale_or_rent = $request->sale_or_rent;
        $ad->advertiser_email = $request->advertiser_email;
        $ad->category_id = $request->category_id;
        $ad->sub_category_id = $request->sub_category_id ?? null;
        $ad->ad_agent_id = $request->ad_agent_id;
        $ad->city_id = $request->city_id;
        $ad->slug = \Str::slug($request->title.$ad->id);
        $ad->attachments()->sync($request->attachments);

        if ($request->has('delete_chart_media') && $ad->chart)
        {
            if ($ad->chart->photo)
                Storage::delete('/public/'.$ad->chart->photo);
            if ($ad->chart->pdf)
                Storage::delete('/public/'.$ad->chart->pdf);
            if ($ad->chart->video)
                Storage::delete('/public/'.$ad->chart->video);

            $ad->chart->update([
                'photo' => null,
                'pdf' => null,
                'video' => null,
            ]);
        }

        if ($request->has('chart_photo') || $request->has('chart_pdf') || $request->has('chart_video') || $request->chart_description) {
            if ($ad->chart) {
                if ($ad->chart->photo && $request->has('chart_photo'))
                    Storage::delete('/public/'.$ad->chart->photo);
                if ($ad->chart->pdf && $request->has('chart_pdf'))
                    Storage::delete('/public/'.$ad->chart->pdf);
                if ($ad->chart->video && $request->has('chart_video'))
                    Storage::delete('/public/'.$ad->chart->video);

                $ad->chart->update([
                    'photo' => $request->has('chart_photo') ? $request->chart_photo->store('Ads/charts/photos', 'public') : $ad->chart->photo,
                    'pdf' => $request->has('chart_pdf') ? $request->chart_pdf->store('Ads/charts/pdfs', 'public') : $ad->chart->pdf,
                    'video' => $request->has('chart_video') ? $request->chart_video->store('Ads/charts/videos', 'public') : $ad->chart->video,
                    'description' => $request->chart_description ?? $ad->chart->description,
                ]);
            } else {
                Chart::query()->create([
                    'photo' => $request->has('chart_photo') ? $request->chart_photo->store('Ads/charts/photos', 'public') : null,
                    'pdf' => $request->has('chart_pdf') ? $request->chart_pdf->store('Ads/charts/pdfs', 'public') : null,
                    'video' => $request->has('chart_video') ? $request->chart_video->store('Ads/charts/videos', 'public') : null,
                    'description' => $request->chart_description ?: null,
                    'ad_id' => $ad->id
                ]);
            }
        }

        // Chart specifications
        $this->updateAdSpecifications($ad, $request, 1);

        if ($request->has('images')) {
            foreach ($ad->photos as $photo) {
                Storage::delete('/public/' . $photo->image_avatar);
                Storage::delete('/public/' . $photo->image_medium);
                Storage::delete('/public/' . $photo->image);
            }
            $ad->photos()->delete();
            foreach ($request->images as $image) {
                $time = time();
                $fileName = $image->getClientOriginalName();

                $image_original = \Intervention\Image\Facades\Image::make($image->getRealPath());
                $image_original->resize(500, 500);
                $image_original->save(public_path('storage/Images/Ad-Images/' . $time . $fileName));

                $image_medium = Image::make($image->getRealPath());
                $image_medium->resize(350, 350);
                $image_medium->save(public_path('storage/Images/Ad-Images/' . $time . 'medium' . $fileName));

                $image_avatar = Image::make($image->getRealPath());
                $image_avatar->resize('100', '100');
                $image_avatar->save(public_path('storage/Images/Ad-Images/' . $time . 'avatar' . $fileName));

                AdPhoto::create([
                    'image' => 'Images/Ad-Images/' . $time . $fileName,
                    'image_medium' => 'Images/Ad-Images/' . $time . 'medium' . $fileName,
                    'image_avatar' => 'Images/Ad-Images/' . $time . 'avatar' . $fileName,
                    'ad_id' => $ad->id
                ]);
            }
        }

        // General specifications
        $this->updateAdSpecifications($ad, $request, 0);

        $ad->save();
        session()->flash('success', 'تم تعديل الاعلان بنجاح');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ad = Ad::query()->findOrFail($id);
        foreach ($ad->photos as $photo) {
            Storage::delete('/public/' . $photo->image_avatar);
            Storage::delete('/public/' . $photo->image_medium);
            Storage::delete('/public/' . $photo->image);
        }
        $ad->delete();
        session()->flash('success', 'تم حذف الاعلان بنجاح');
        return back();
    }

    protected function updateAdSpecifications($ad, $request, $is_chart)
    {
        $specifications = $is_chart ? 'chart_specifications' : 'specifications';
        $specificationsQuery = $ad->specifications()->where('is_chart', $is_chart);
        if ($specificationsQuery->count()) {
            $specificationsQuery->delete();
        }

        if ($request->has($specifications)) {
            foreach ($request->$specifications as $item) {
                AdSpecification::query()->create([
                    'key' => $item['key'],
                    'value' => $item['value'],
                    'is_chart' => $is_chart,
                    'ad_id' => $ad->id
                ]);
            }
        }
    }
}
