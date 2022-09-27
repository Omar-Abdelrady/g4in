<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:users',
            'phone' => 'required|unique:users',
            'password' => 'required|confirmed',
            'country' => 'required',
            'confirm' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => 'عذرا الاسم الاول مطلوب',
            'last_name.required' => 'عذرا الاسم الثاني مطلوب',
            'email.required' => 'عذرا البريد الالكتروني مطلوب',
            'email.unique' => 'عذرا هذا البريد الالكتروني موجود بالفعل',
            'password.required' => 'يجب كتابة كلمة السر الخاصة بك',
            'password.confirmed' => 'عذرا يرجي التأكد من كلمة السر',
            'country.required' => 'عذرا يرجي كتابة البلد',
            'confirm.required' => 'عذرا يجب الموافقه علي سياسة الخصوصية وشروط الاستخدام!',
            'phone.required' => 'يرجي كتابة رقم الهاتق',
            'phone.unique' => 'هذا الرقم موجود بالفعل'
        ];
    }
}
