<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    public function login()
    {
        if(!session()->has('url.intended'))
        {
            session(['url.intended' => url()->previous()]);
        }
        return view('admin.pages.auth.login');
    }

    public function submit(Request $request)
    {
        $data = $request->validate([
            'email'=> 'required',
            'password'  => 'required'
        ]);
        $admin = DB::table('admins')->where('email', $data['email'])->first();
        if ($admin){
            if ( Auth::guard('admin')->attempt($data, $request->has('remember') ? true : null))
            {
                return redirect(session()->get('url.intended'));
            }else{
                session()->flash('error', 'عذرا يجب كتابة كلمة السر بشكل صحيح');
                return redirect()->back();
            }
        }else{
            session()->flash('error', 'عذرا يجب كتابة البريد الالكتروني وكلمة السر بشكل صحيح');
            return redirect()->back();
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }
}
