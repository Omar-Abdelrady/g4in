<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Estate\CreateAdRequest;
use App\Models\Ad;
use App\Models\AdCategory;
use App\Models\AdCity;
use App\Models\AdPhoto;
use App\Models\Country;
//use Cassandra\Collection;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Storage;

class AdController extends Controller
{
    public function index()
    {
        $categories = AdCategory::query()->get();
        $cytis = AdCity::query()->get();
        $ads = Ad::query()->where('ad_status', 1)->latest()->paginate(6);
        return view('website.ads', compact('categories', 'cytis', 'ads'));
    }


    public function create()
    {

        $categories = AdCategory::query()->get();
        $countries = Country::query()->get();
        return view('website.create-ad', compact('categories', 'countries'));
    }

    public function store(CreateAdRequest $request)
    {
        $rand = rand(0000, 9999);
        $ad = Ad::query()->create([
            'title' => $request->title,
            'slug' => \Str::slug($request->title . $rand),
            'advertiser_name' => $request->advertiser_name,
            'description' => $request->description,
            'price' => $request->price,
            'space' => $request->space,
            'address' => $request->address,
            'phone' => $request->phone,
            'second_phone' => $request->second_phone,
            'sale_or_rent' => $request->sale_or_rent,
            'category_id' => $request->category_id,
            'advertiser_email' => $request->advertiser_email,
            'meridians' => $request->meridians,
            'latitudes' => $request->latitudes,
            'city_id' => $request->city_id,
            'user_id' => \Auth::guard('web')->id()
        ]);
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
        session()->flash('success', 'تم اضافة الاعلان بنجاح سوف يتم مراجعته والنشر');
        return redirect()->route('ads.index');
    }

    public function getCities($id)
    {
        $cities = Country::query()->findOrFail($id)->cities;
        return response()->json($cities, 200);
    }

    public function search(Request $request)
    {
        if ($request->country_id) {
            $countryQuery = Country::query()->where('id', $request->country_id);
            if ($request->city_id) {
                $ads_query = AdCity::query()
                    ->where('country_id', $request->country_id)
                    ->where('id', $request->city_id)
                    ->with('ads', function ($query) use ($request) {
                        $query->where('city_id', $request->city_id);
                        if ($request->sale_or_rent !== null) {
                            $query->where('sale_or_rent', '=', $request->sale_or_rent);
                        }

                        if ($request->category_id !== null) {
                            $query->where('category_id', $request->category_id);
                        }
                        $query->where('title', 'LIKE', "%{$request->search}%")->where('ad_status', '=', 1);
                    });
                $ads = $this->paginate($ads_query->get()->pluck('ads')->collapse(), 10);
            } else {
                $ads_query = $countryQuery->with('cities.ads', function ($query) use ($request) {
                    if ($request->sale_or_rent !== null) {
                        $query->where('sale_or_rent', '=', $request->sale_or_rent);
                    }

                    if ($request->category_id !== null) {
                        $query->where('category_id', $request->category_id);
                    }
                    $query->where('title', 'LIKE', "%{$request->search}%")->where('ad_status', '=', 1);
                });
                $ads = $this->paginate($ads_query->get()->pluck('cities')->collapse()->pluck('ads')->collapse(), 10);
            }
        } else {
            $ads_query = Ad::query();
            if ($request->sale_or_rent) {
                $ads_query->where('sale_or_rent', '=', $request->sale_or_rent);
            }

            if ($request->category_id) {
                $ads_query->where('category_id', $request->category_id);
            }
            $ads_query->where('title', 'LIKE', "%{$request->search}%")->where('ad_status', '=', 1);
            $ads = $ads_query->paginate(10);
        }
        return view('website.ads', compact('ads'))->with(['sale_or_rent' => $request->sale_or_rent, 'category_id' => $request->category_id, 'search' => $request->search, 'city_id', $request->city_id, 'country_id' => $request->country_id]);
    }

    public function paginate($items, $perPage = 5, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }

    public function show($slug)
    {
        $ad = Ad::query()->where('slug', $slug)->first();
        $ad ?: abort(404);
        //        $ad = Ad::query()->findOrFail($ad->id);

        $specifications = $ad->specifications;
        $general_specifications = [];
        $chart_specifications = [];
        foreach ($specifications as $item) {
            if ($item->is_chart)
                $chart_specifications[] = $item;
            else
                $general_specifications[] = $item;
        }

        $ads = $ad->category->ads()->latest()->take(2)->get();
        return view('website.ad-single', compact('ad', 'ads', 'general_specifications', 'chart_specifications'));
    }

    public function dwonload($slug)
    {
        $ad = Ad::query()->where('slug', $slug)->first();
        $ad ?: abort(404);
        return Storage::disk('public')->download($ad->chart->pdf, $ad->title . '.pdf');
    }

    public function countryAd($country_id)
    {
        $ads = Country::query()->findOrFail($country_id)->with('cities.ads');
        $ads = $this->paginate($ads->get()->pluck('cities')->collapse()->pluck('ads')->collapse(), 10);
        return view('website.ads', compact('ads'));
    }
}
