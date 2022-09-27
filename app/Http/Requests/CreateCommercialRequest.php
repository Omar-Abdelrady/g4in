<?php

namespace App\Http\Requests;

use App\Models\Commercial;
use Illuminate\Foundation\Http\FormRequest;

class CreateCommercialRequest extends FormRequest
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
        if ($this->method() == 'PUT')
        {
            $commercialId = Commercial::query()->findOrFail($this->route('id'))->id;
            return [
                'name' => 'required|max:50|unique:commercials,name,'.$commercialId,
                'description' => 'required',
                'sub_description' => 'required|max:150',
            ];
        }
        return [
            'name' => 'required|max:50|unique:commercials,name',
            'description' => 'required',
            'sub_description' => 'required|max:150',
            'image' => 'required'
        ];
    }
}
