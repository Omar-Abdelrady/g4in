<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CouponRequest extends FormRequest
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
            'name' => 'required',
            'image' => 'required',
            'description' => 'required',
            'coupon' => 'required',
            'exp_date' => 'required',
            'discount' => 'required|integer|min:1|max:100'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'عذرا الاسم مطلوب',
            'description.required' => 'عذرا الوصف مطلوب',
            'coupon.required' => 'عذرا الكوبون مطلوب',
            'discount.required' => 'عذرا الخصم مطلوب',
            'exp_date.required' => 'عذرا تاريخ الانتهاء مطلوب',
            'discount.integer' => 'عذرا يجب ان يكون الخصم رقم',
            'discount.min' => 'عذرا يجب ان يكون ادنى حد للخصم هو 1%',
            'discount.max' => 'عذرا يجب ان يكون اقصى حد للخصم هو 100%',
        ];
    }
}
