<?php

namespace App\Http\Requests;

use App\Rules\CustomSlug;
use Illuminate\Foundation\Http\FormRequest;

class StoreProposalRequest extends FormRequest
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
        // dd($this->service_id);
        return [
            'name' => 'required|max:60',
            //class should be add after merge !!
            'slug' => new CustomSlug('proposals'),
            'company_name' => 'nullable',
            'file_path' => 'nullable',
            'email' => 'required',
            'user_id' => 'required|exists:users,id',
            'industry_id' => 'required|exists:industries,id',
            'service_id' => 'required|exists:services,id',
            'description' => 'required',
        ];
    }
}
