<?php

namespace App\Http\Requests;

use App\Rules\CustomSlug;
use Illuminate\Foundation\Http\FormRequest;

class UpdateJobOfferRequest extends FormRequest
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
            'slug' => new CustomSlug('job_offers', $this->jobOffer->id),
            'description' => 'required',
            'image' => 'image|mimes:png,jpeg,gif,png,svg'
        ];
    }
}
