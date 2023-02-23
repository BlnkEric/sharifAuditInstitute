<?php

namespace App\Http\Requests;

use App\Rules\CustomSlug;
use Illuminate\Foundation\Http\FormRequest;

class UpdateStaffRequest extends FormRequest
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
            'role' => 'required|max:60',
            'industry_id' => 'nullable|exists:industries,id',
            'slug' => new CustomSlug('staffs', $this->staff->id),
            'description' => 'required',
            'image' => 'image|mimes:png,jpeg,gif,png,svg',
            'phone' => 'required|numeric',
            'email' => 'required',
            'staff_category_id' => 'required|exists:staff_categories,id'
        ];
    }
}
