<?php

namespace App\Http\Requests\Web\Store;

use Illuminate\Foundation\Http\FormRequest;

class FeedbackProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'evaluate' => 'required|integer|max:5|min:1',
            'comment' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'evaluate.required' => 'يرجي تقييم المنتج',
            'evaluate.integer' => 'يجب ان يكون تقييم المنتج رقم',
            'evaluate.max' => 'اكبر تقييم يكون رقم 5',
            'evaluate.min' => 'اقل تقييم هو رقم 1',
            'comment.required' => 'يرجي كتابة تعليق علي المنتج'
        ];
    }
}
