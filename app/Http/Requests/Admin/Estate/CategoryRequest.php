<?php

namespace App\Http\Requests\Admin\Estate;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'sub_description' => 'required',
            'keywords' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'الاسم مطلوب',
            'description.required' => 'الوصف مطلوب',
            'keywords.required' => 'الكلمات الدلالية مطلوبة'
        ];
    }
}
