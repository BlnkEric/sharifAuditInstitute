<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\File;

class StoreReportRequest extends FormRequest
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
            'description' => 'required',
            'file' => 'required|mimes:pdf,xlx,csv|max:2048',
            // 'file' => [
            //     'required',
            //     File::types(['pdf', 'csv'])
            //         ->max(1024),
            // ]
        ];
    }
}
