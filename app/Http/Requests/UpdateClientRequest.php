<?php

namespace App\Http\Requests;

use App\Rules\UpdateIfNull;
use Illuminate\Foundation\Http\FormRequest;

class UpdateClientRequest extends FormRequest
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
            'name' => 'required|max:60',
            'industry_id' => 'exists:industries,id',
            'services' => 'required|exists:services,id',
            'image' => 'image|mimes:png,jpeg,gif,png,svg|dimensions:max_width=640,max_height=640',
        ];
    }

    public function messages()
    {
        return [
            'services.required' => 'انتخاب بخش خدمات الزامی است. خدمات پیشین جایگذاری شدند',
            'services.exists' => 'لطفاً خدمات معتبر را انتخاب نمایید.',
            'industry_id.required' => 'انتخاب بخش صنعت الزامی است.',
            'industry_id.exists' => 'لطفاً یک صنعت معتبر را انتخاب نمایید.',
            'image.dimensions' => 'لوگو باید حداکثر در ابعاد 640 در 640 پیکسل باشد'
        ];
    }

}
