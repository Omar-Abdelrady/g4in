<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function show($slug)
    {
        $service = Service::query()->where('slug', $slug)->first();
        return view('website.single-service', compact('service'));
    }
}
