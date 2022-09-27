<?php

namespace App\Http\Controllers\Admin\Store;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Store\CreateCategoryRequest;
use App\Http\Requests\Admin\Store\EditCategoryRequest;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->paginate(10);
        return view('admin.pages.Store Section.Category.index', compact('categories'));
    }

    public function edit($slug)
    {
        $category_id = DB::table('categories')->where('slug', $slug)->first();
        $category = Category::findOrFail($category_id->id);
        return view('admin.pages.Store Section.Category.edit', compact('category'));
    }

    public function update(EditCategoryRequest $request, $id)
    {
        $category = Category::findOrFail($id);
        if ($request->has('image'))
        {
            if (!File::exists(public_path('storage/Images/Categories/')))
            {
                File::makeDirectory(public_path('storage/Images/Categories/'), 0777, true, true) ;
            }
            \Storage::delete('/public/'. $category->image);
            $time = time();
            $ext = $request->image->getClientOriginalExtension();
            $fileName = $time.uniqid().'.'.$ext;
            $image = Image::make($request->image->getRealPath());
            $image->resize(1350, 800);
            $image->save(public_path('storage/Images/Categories/' . $fileName));
            $category->image = 'Images/Categories/' . $fileName;
        }
        $category->name = $request->name;
        $category->sub_description = $request->sub_description;
        $category->keywords = $request->keywords;
        $category->slug = Str::slug($request->name, '-');
        $category->save();
        session()->flash('success', 'تم التعديل بنجاح');
        return redirect()->route('admin.store.category');
    }

    public function show($slug)
    {
        $category_id = DB::table('categories')->where('slug', $slug)->first();
        $category = Category::findOrFail($category_id->id);
        return view('admin.pages.Store Section.Category.show', compact('category'));
    }

    public function create()
    {
        return view('admin.pages.Store Section.Category.edit');
    }

    public function store(CreateCategoryRequest $request): \Illuminate\Http\RedirectResponse
    {
        $time = time();
        $ext = $request->image->getClientOriginalExtension();
        $fileName = $time.uniqid().'.'.$ext;
        $image = Image::make($request->image->getRealPath());
        $image->resize(1350, 800);
        $image->save(public_path('storage/Images/Categories/' . $fileName));
        Category::create([
            'name' => $request->name,
            'sub_description' => $request->sub_description,
            'keywords' => $request->keywords,
            'slug' => Str::slug($request->name, '-'),
            'image' => 'Images/Categories/' . $fileName
        ]);
        session()->flash('success', 'تم إضافة القسم بنجاح');
        return redirect()->route('admin.store.category');
    }
    public function destroy($slug)
    {
        $category = Category::query()->where('slug', $slug)->first();
        \Storage::delete('/public/'. $category->image);
        $category->delete();
        session()->flash('success', 'تم حذف القسم بنجاح');
        return redirect()->route('admin.store.category');
    }
}
