<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        return view('admin.pages.auth.profile.index');
    }

    public function edit()
    {
        $user = auth()->guard('admin')->user();
        return view('admin.pages.auth.profile.edit-create', compact('user'));
    }

    public function store()
    {

    }

    public function update(Request $request)
    {
        if ($request->has('new_password'))
        {
            $data = $request->validate([
                'name' => 'required',
                'email' => 'required',
                'new_password'  => 'required|confirmed',
                'password' => 'required'
            ]);
        }
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

    }
}
