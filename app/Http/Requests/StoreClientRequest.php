<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClientRequest extends FormRequest
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
        // dd($this->all());
        return [
            'name' => 'required|max:60',
            'industry_id' => 'required|exists:industries,id',
            'services' => 'required|exists:services,id',
            'image' => 'required|image|mimes:png,jpeg,gif,png,svg|dimensions:max_width=640,max_height=640',
        ];
    }

    public function messages()
    {
        return [
            'services.required' => 'انتخاب بخش خدمات الزامی است.',
            'industry_id.required' => 'انتخاب بخش صنعت الزامی است.',
            'image.dimensions' => 'لوگو باید حداکثر در ابعاد 640 در 640 پیکسل باشد'
            // 'industry_id.exists' => 'لطفاً یک صنعت معتبر را انتخاب نمایید.',
            // 'service_id.required' => 'انتخاب بخش خدمت الزامی است.',
            // 'service_id.exists' => 'لطفاً یک خدمت معتبر را انتخاب نمایید.',
        ];
    }

}
