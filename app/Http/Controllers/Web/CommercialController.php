<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Commercial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CommercialController extends Controller
{
    public function show($slug)
    {
        $commercial = Commercial::query()->where('slug', $slug)->first();
        return view('website.single_commercial', compact('commercial'));
    }

    public function download($slug)
    {
        $commercial = Commercial::query()->where('slug', $slug)->first();
        return Storage::disk('public')->download($commercial->attachment->pdf_name, $commercial->name . '.pdf');
    }
}
