<?php

namespace App\Http\Requests\Web\Store;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
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
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
            'city' => 'required',
            'country' => 'required',
            'zip' => 'required',
            'comment' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => 'عذرا الاسم الاول مطلوب',
            'last_name.required' => 'عذرا الاسم الثاني مطلوب',
            'email.required' => 'عذرا البريد الالكتروني مطلوب',
            'email.email' => 'يجب كتابة البريد الالكتروني بشكل صحيح',
            'phone.required' => 'عذرا رقم الهاتف مطلوب',
            'address.required' => 'عذرا العنوان مطلوب مطلوب',
            'city.required' => 'عذرا المدينة مطلوبة',
            'country.required' => 'عذرا البلد مطلوبة',
            'zip.required' => 'عذرا الرمز البريدي مطلوب',
            'comment.required' => 'عذرا الملاحظة مطلوبة',
        ];
    }
}
