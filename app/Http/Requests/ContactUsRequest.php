<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactUsRequest extends FormRequest
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
            'full_name' => 'required|max:100',
            'email' => 'required|max:100',
            'phone' => 'required|max:100',
            'message' => 'required',
        ];
    }

    public function messages()
    {
        return [
          'full_name.required' => 'عذرا يرجي كتابة الاسم.',
          'email.required' => 'عذرا يرجي كتابة البريد الإلكتروني.',
          'phone.required' => 'عذرا يرجي كتابة رقم الهاتف.',
          'message.required' => 'عذرا يرجي كتابة الرسالة.',
          'full_name.max' => 'عذرا الحد الاقصى لحروف الاسم 100 حرف.',
          'email.max' => 'عذرا الحد الاقصى لحروف الإلكتروني 100 حرف.',
          'phone.max' => 'عذرا الحد الاقصى لرقم الهاتف 100 رقم.',
        ];
    }
}
