<?php

namespace App\Http\Controllers\Web\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register()
    {
        return view('website.regester');
    }

    public function submit(RegisterRequest $request)
    {
//        dd($request->first_name);
        User::query()->create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'country' => $request->country
        ]);
        session()->flash('success', 'تم إنشاء الحساب بنجاح');
        return redirect()->route('login.index');
    }
}
