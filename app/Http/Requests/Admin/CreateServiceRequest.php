<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CreateServiceRequest extends FormRequest
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
            'name' => 'required|max:150',
            'images' => 'required',
            'image' => 'required',
            'description' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'يرجي كتابة اسم الخدمة',
            'name.max' => 'يجب ان لا يزيد الاسم عن 150 حرف',
            'images.required' => 'يرجى اختيار الصور',
            'image.required' => 'يرجي اختيار الصورة',
            'description.required' => 'يرجي كتابة وصف الخدمة',
        ];
    }
}
