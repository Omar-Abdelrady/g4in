<?php

namespace App\Http\Requests\Admin\Estate;

use Illuminate\Foundation\Http\FormRequest;

class CreateOrUpdateAgentsRequest extends FormRequest
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
        $validation = [
            'name' => 'required|max:100',
            'email' => 'required|max:100',
            'phone' => 'required|max:50',
            'description' => 'required|max:250',
            'rate' => 'required|max:5|min:1',
        ];
        if ($this->method() != 'PUT')
        {
            $validation['image'] =  'required';
        }
        return $validation;
    }

    public function messages()
    {
        return [
            'name.required' => 'عذرا الاسم مطلوب',
            'name.max' => 'اقصى عدد حروف للاسف هو 100 حرف',
            'email.required' => 'عذرا البريد الالكتروني مطلوب',
            'email.max' => 'اقصى عدد حروف للبريد هو 100 حرف',
            'phone.required' => 'عذرا رقم الهاتف مطلوب',
            'phone.max' => 'اقصى عدد حروف رقم الهاتف هو 50 رقم',
            'description.required' => 'من فضلك الوصف مطلوب'
        ];
    }
}
