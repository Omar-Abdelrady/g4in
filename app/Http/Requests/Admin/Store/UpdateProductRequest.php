<?php

namespace App\Http\Requests\Admin\Store;

use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;

class UpdateProductRequest extends FormRequest
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
        $id = DB::table('products')->where('slug', $this->slug)->first();
        $product = Product::FindOrFail(isset($id) ? $id->id : null);

        if (Request::has('images')) {

            return [
                'name' => "required|unique:products,name,$product->id",
                'sub_description' => 'required',
                'description' => 'required',
                'keywords' => 'required',
                'category' => 'required',
                'images' => 'required|min:2|max:4',
                'colors' => 'required',
                'sizes' => 'required'
            ];
        } else {
            return [
                'name' => "required|unique:products,name,$product->id",
                'sub_description' => 'required',
                'description' => 'required',
                'keywords' => 'required',
                'category' => 'required',
                'colors' => 'required',
                'sizes' => 'required'
            ];
        }

    }

    public function messages()
    {
        return array(
            'name.required' => 'عفوا يرجي كتابة اسم المنتج',
            'name.unique' => 'عفوا هذا المنتج موجود بالفعل',
            'sub_description' => 'يرجي كتابة الوصف القصير للمنتج',
            'description' => 'يرجي كتابة وصف المنتج',
            'keywords' => 'يرجي كتابة الكلامات الدلالية للمنتج',
            'category' => 'يرجي اختيار القسم الخاص باالمنتج',
            'images.required' => 'عفوا يرجي اختيار صور المنتج',
            'images.min' => 'عفوا يجب ان يكون للمنتج صورتين علي الاقل',
            'images.max' => 'عفوا يجب ان لا يكون للمنتج اكثر من اربعة صور',
            'sizes.required' => 'عفوا حجم المنتج مطلوب',
            'colors.required' => 'عفوا لون المنتج مطلوب'
        );
    }
}
