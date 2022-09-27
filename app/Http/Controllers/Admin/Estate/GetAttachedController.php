<?php

namespace App\Http\Controllers\Admin\Estate;

use App\Http\Controllers\Controller;
use App\Models\AdCategory;
use Illuminate\Http\Request;

class GetAttachedController extends Controller
{
    public function get(Request $request)
    {
        $request->validate(['category_id' => 'required']);
        $attacheds = AdCategory::query()->findOrFail($request->category_id)->attacheds;
        return response()->json($attacheds);
    }
}
