<?php

namespace App\Http\Requests\Admin\Store;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductsRequest extends FormRequest
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
            'name' => 'required|unique:products,name',
            'category' => 'required',
            'sub_description' => 'required',
            'description' => 'required',
            'images' => 'required|min:2|max:4',
            'keywords' => 'required',
            'colors' => 'required',
            'sizes' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'عفوا يرجي كتابة اسم المنتج',
            'name.unique' => 'عفوا هذا المنتج موجود بالفعل',
            'category.required' => 'عفوا يرجي اختيار القسم الخاص بالمنتج',
            'description.required' => 'عفوا يرجي كتابة وصف المنتج',
            'sub_description.required' => 'عفوا يرجي كتابة الوصف القصير الخاص بالمنتج',
            'images.required' => 'عفوا يرجي اختيار صور المنتج',
            'images.min' => 'عفوا يجب ان يكون للمنتج صورتين علي الاقل',
            'images.max' => 'عفوا يجب ان لا يكون للمنتج اكثر من اربعة صور',
            'keywords.required' => 'عفوا يرجي كتابة الكلامات الدلالية',
            'sizes.required' => 'عفوا حجم المنتج مطلوب',
            'colors.required' => 'عفوا لون المنتج مطلوب'
        ];
    }
}
