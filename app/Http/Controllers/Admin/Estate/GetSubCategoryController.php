<?php

namespace App\Http\Controllers\Admin\Estate;

use App\Http\Controllers\Controller;
use App\Models\AdCategory;
use Illuminate\Http\Request;

class GetSubCategoryController extends Controller
{
    public function get($id)
    {
        $sub_categories = AdCategory::query()->findOrFail($id)->subCategories;
        return response()->json($sub_categories, 200);
    }
}
