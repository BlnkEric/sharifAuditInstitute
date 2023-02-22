<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateReportRequest extends FormRequest
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
            'user_id' => 'required|exists:users,id',
            'description' => 'required',
            'file' => 'required|mimes:pdf,xlx,csv|max:2048',

        ];
    }

    public function messages()
    {
        return [
            'user_id.required' => 'انتخاب بخش مشتریان الزامی است.',
            'user_id.exists' => 'لطفاً یک کاربر معتبر را انتخاب نمایید.',
        ];
    }
}
