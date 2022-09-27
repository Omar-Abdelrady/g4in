<?php

namespace App\Http\Requests\Web\Estate;

use Illuminate\Foundation\Http\FormRequest;

class CreateAdRequest extends FormRequest
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
        if (request()->_method == 'PUT') {
            return [
                // 'ad_code' => 'required|unique:ads,ad_code,' . request()->id,
                'title' => "required|max:200",
                // 'description' => 'required',
                // 'short_description' => 'required',
                'price' => 'max:200',
                'space' => 'max:200',
                // 'address' => 'required',
                'chart_photo' => 'image|mimes:png,jpg,jpeg,gif|max:2000',
                'chart_pdf' => 'mimes:pdf|max:10000',
                'chart_video' => 'mimes:mp4,mov,ogg,qt|max:20000',
                'chart_description' => 'nullable|string',
                'advertiser_name' => 'max:200',
                'advertiser_email' => 'nullable|email',
                'phone' => 'max:200',
                'second_phone' => 'max:200',
                // 'meridians' => 'required',
                // 'latitudes' => 'required',
                'sale_or_rent' => 'required',
                'category_id' => 'required',
                // 'ad_agent_id' => 'required',
                'city_id' => 'required',
            ];
        }elseif (request()->_method == 'POST')
        {
            return [
                // 'ad_code' => 'required|unique:ads,ad_code',
                'title' => "required|max:200",
                // 'description' => 'required',
                // 'short_description' => 'required',
                'price' => 'max:200',
                'space' => 'max:200',
                // 'address' => 'required',
                'chart_photo' => 'image|mimes:png,jpg,jpeg,gif|max:2000',
                'chart_pdf' => 'mimes:pdf|max:10000',
                'chart_video' => 'mimes:mp4,mov,ogg,qt|max:20000',
                'chart_description' => 'nullable|string',
                'advertiser_name' => 'max:200',
                'advertiser_email' => 'nullable|email',
                'phone' => 'max:200',
                'second_phone' => 'max:200',
                // 'meridians' => 'required',
                // 'latitudes' => 'required',
                'sale_or_rent' => 'required',
                'category_id' => 'required',
                // 'ad_agent_id' => 'required',
                'city_id' => 'required',
                'images' => 'required'
            ];
        }

        return [
            // 'ad_code' => 'required|unique:ads,ad_code',
            'title' => 'required|max:200',
            // 'description' => 'required',
            'price' => 'max:200',
            'space' => 'max:200',
            // 'address' => 'required',
            'chart_photo' => 'image|mimes:png,jpg,jpeg,gif|max:2000',
            'chart_pdf' => 'mimes:pdf|max:10000',
            'chart_video' => 'mimes:mp4,mov,ogg,qt|max:20000',
            'chart_description' => 'nullable|string',
            'advertiser_name' => 'max:200',
            'advertiser_email' => 'nullable|email',
            'phone' => 'max:200',
            'second_phone' => 'max:200',
            // 'meridians' => 'required',
            // 'latitudes' => 'required',
            'sale_or_rent' => 'required',
            'city_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'ad_code.required' => 'ﻋﺬﺭا ﺭﻗﻢ اﻻﻋﻼﻥ ﻣﻄﻠﻮﺏ',
            'ad_code.unique' => 'ﻋﺬﺭا ﺭﻗﻢ اﻻﻋﻼﻥ ﻣﻮﺟﻮﺩ ﻣﻦ ﻗﺒﻞ ﻳﺠﺐ اﺩﺧﺎﻝ ﺭﻗﻢ ﺟﺪﻳﺪ',
            'images.required' => 'ﻋﺬﺭا ﺻﻮﺭ اﻻﻋﻼﻥ ﻣﻄﻠﻮﺑﺔ',
            'title.required' => 'ﻋﺬﺭا اﻻﺳﻢ ﻣﻄﻠﻮﺏ',
            'title.max' => 'اﻗﺼﻰ ﺣﺪ ﻟﻠﻌﻨﻮاﻥ 200 ﺣﺮﻑ',
            'advertiser_name.required' => 'ﻋﺬﺭا ﻳﺠﺐ ﻛﺘﺎﺑﺔ اﺳﻢ ﺻﺎﺣﺐ اﻻﻋﻼﻥ',
            'advertiser_name.max' => 'اﻗﺼﻰ ﺣﺪ ﻟﻻﺳﻢ 200 ﺣﺮﻑ',
            'description.required' => 'ﻋﺬﺭا اﻟﻮﺻﻒ ﻣﻄﻠﻮﺏ',
            'short_description.required' => 'ﻋﺬﺭا اﻟﻮﺻﻒ اﻟﻘﺼﻴﺮ ﻣﻄﻠﻮﺏ',
            'price.required' => 'ﻋﺬﺭا اﻟﺴﻌﺮ ﻣﻄﻠﻮﺏ',
            'price.max' => 'اﻗﺼﻰ ﺣﺪ ﻟﻠﺴﻌﺮ 200 ﺭﻗﻢ',
            'space.required' => 'ﻋﺬﺭا اﻟﻤﺴﺎﺣﺔ ﻣﻄﻠﻮﺑﺔ',
            'space.max' => 'اﻗﺼﻰ ﺣﺪ ﻟﻠﻤﺴﺎﺣﺔ ﻫﻮ 200 ﺭﻗﻢ',
            'address.required' => 'ﻋﺬﺭا اﻟﻌﻨﻮاﻥ اﻟﺘﻔﺼﻴﻠﻲ ﻣﻄﻠﻮﺏ',
            'phone.required' => 'ﻋﺬﺭا ﺭﻗﻢ اﻟﻬﺎﺗﻒ ﻣﻄﻠﻮﺏ',
            'phone.max' => 'ﻋﺬﺭا اﻗﺼﻰ ﺣﺪ ﻟﺮﻗﻢ اﻟﻬﺎﺗﻒ ﻫﻮ 200 ﺭﻗﻢ',
            'second_phone.required' => 'ﻋﺬﺭا ﺭﻗﻢ اﻟﻬﺎﺗﻒ اﻟﺜﺎﻧﻲ ﻣﻄﻠﻮﺏ',
            'second_phone.max' => 'ﻋﺬﺭا اﻗﺼﻰ ﺣﺪ ﻟﺮﻗﻢ اﻟﻬﺎﺗﻒ اﻟﺜﺎﻧﻲ ﻫﻮ 200 ﺭﻗﻢ',
            'meridians.required' => 'ﻋﺬﺭا ﻳﺠﺐ اﻟﺘﺄﻛﺪ ﻣﻦ ﺗﺤﺪﻳﺪ ﻣﻮﻗﻌﻚ ﻋﻠﻲ اﻟﺨﺮﻳﻄﺔ',
            'latitudes.required' => 'ﻋﺬﺭا ﻳﺠﺐ اﻟﺘﺄﻛﺪ ﻣﻦ ﺗﺤﺪﻳﺪ ﻣﻮﻗﻌﻚ ﻋﻠﻲ اﻟﺨﺮﻳﻄﺔ',
            'sale_or_rent.required' => 'ﻋﺬﺭا ﻳﺮﺟﻲ ﺗﺤﺪﻳﺪ ﺣﺎﻟﺔ اﻻﻋﻼﻥ ﻟﻠﺒﻴﻊ اﻡ اﻻﻳﺠﺎﺭ',
            'advertiser_email.email' => 'ﻋﺬﺭا ﻳﺮﺟﻲ اﺩﺧﺎﻝ ﺑﺮﻳﺪ اﻟﻜﺘﺮﻭﻧﻰ ﺻﺎﻟﺢ',
            'advertiser_email.max' => 'ﻋﺬﺭا اﻗﺼﻰ ﺣﺪ ﻟﻠﺒﺮﻳﺪ اﻻﻟﻜﺘﺮﻭﻧﻲ ﻫﻮ 200 ﺣﺮﻑ',
            'category_id.required' => 'ﻋﺬﺭا ﻳﺮﺟﻲ اﺧﺘﻴﺎﺭ اﻟﻘﺴﻢ اﻟﺨﺎﺹ ﺑﺎﻻﻋﻼﻥ',
            'ad_agent_id.required' => 'ﻋﺬﺭا ﻳﺮﺟﻲ اﺧﺘﻴﺎﺭ ﻭﻛﻴﻞ اﻻﻋﻼﻥ',
            'city_id.required' => 'ﻳﺮﺟﻲ اﺧﺘﻴﺎﺭ اﻟﻤﺪﻳﻨﺔ',
            'chart_photo.image' => 'ﺻﻮﺭﺓ اﻟﻤﺨﻄﻂ ﻳﺠﺐ اﻥ ﺗﻜﻮﻥ ﺻﻮﺭﺓ',
            'chart_photo.mimes' => 'ﺻﻴﻐﺔ ﺻﻮﺭﺓ اﻟﻤﺨﻄﻂ ﻳﺠﺐ اﻥ ﺗﻜﻮﻥ png اﻭ jpg اﻭ jpeg اﻭ gif',
            'chart_photo.max' => 'ﺣﺠﻢ ﺻﻮﺭﺓ اﻟﻤﺨﻄﻂ ﻳﺠﺐ اﻥ ﻻ ﻳﺘﺠﺎﻭﺯ 2MB',
            'chart_pdf.mimes' => 'ﻣﻠﻒ pdf ﻳﺠﺐ اﻥ ﻳﻜﻮﻥ ﺑﺼﻴﻐﺔ pdf',
            'chart_pdf.max' => 'ﻣﻠﻒ ال pdf ﻟﻠﻤﺨﻄﻂ ﻳﺠﺐ اﻻ ﻳﺘﺠﺎﻭﺯ 10MB',
            'chart_video.mimes' => 'ﺻﻴﻐﺔ ﻣﻠﻒ اﻟﻔﻴﺪﻳﻮ ﻟﻠﻤﺨﻄﻂ ﻳﺠﺐ اﻥ ﺗﻜﻮﻥ mp4 اﻭ mov اﻭ ogg اﻭ qt',
            'chart_video.max' => 'ﻣﻠﻒ اﻟﻔﻴﺪﻳﻮ ﻟﻠﻤﺨﻄﻂ ﻳﺠﺐ اﻻ ﻳﺘﺠﺎﻭﺯ 20MB',
            'chart_description.string' => 'ﻭﺻﻒ اﻟﻤﺨﻄﻂ ﻳﺠﺐ اﻥ ﻳﻜﻮﻥ ﻧﺺ'
        ];
    }
}
