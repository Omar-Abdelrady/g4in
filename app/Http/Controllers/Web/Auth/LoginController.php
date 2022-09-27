<?php

namespace App\Http\Controllers\Web\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use URL;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:web')->except('logout');
    }
    public function login()
    {
        if(!session()->has('url.intended'))
        {
            session(['url.intended' => url()->previous()]);
        }
        return view('website.login_1');
    }
    public function submit(Request $request)
    {
        $data = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ],
        [
            'email.required' => 'البريد الالكتروني مطلوب',
            'password.required' => 'الرقم السري مطلوب'
        ]);
        $user = User::query()->where('email', $data['email'])->first();
        if ($user)
        {
            if (\Auth::guard('web')->attempt($data, $request->has('remember') ? true : null)){
                return redirect(session()->get('url.intended'));
            }else{
                session()->flash('error', 'عذرا يجب التأكد من كلمة السر');
                return back();
            }
        }else{
            session()->flash('error', 'عذرا هذا المستخدم غير موجود');
            return back();
        }
    }
    public function logout()
    {
        auth()->logout();
        return back();
    }
}
