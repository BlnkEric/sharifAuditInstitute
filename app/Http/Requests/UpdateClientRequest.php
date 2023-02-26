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
        // dd($this->industry);
        return [
            'name' => 'required|max:60',
            'industry_id' => 'exists:industries,id',
            'ser[]' => 'exists:services,id',

            // 'image' => 'image|mimes:png,jpeg,gif,png,svg',
        ];
    }
}
