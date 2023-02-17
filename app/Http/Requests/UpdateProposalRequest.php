<?php

namespace App\Http\Requests;

use App\Rules\CustomSlug;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProposalRequest extends FormRequest
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
            'slug' => new CustomSlug('proposals', $this->proposal->id),
            'company_name' => 'nullable',
            'email' => 'required',
            'industry_id' => 'required|exists:industries,id',
            'service_id' => 'required|exists:services,id',
            'description' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'industry_id.required' => 'انتخاب بخش صنعت الزامی است.',
            'industry_id.exists' => 'لطفاً یک صنعت معتبر را انتخاب نمایید.',
            'service_id.required' => 'انتخاب بخش خدمت الزامی است.',
            'service_id.exists' => 'لطفاً یک خدمت معتبر را انتخاب نمایید.',
        ];
    }
}
