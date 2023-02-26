<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule as ValidationRule;

class UpdateIfNull implements Rule
{
    private $table, $model;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($table, $model=null)
    {
        $this->table = $table;
        $this->model = $model;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        // dd($attribute, $value);
        // dd($this->model->image);
        $validator = Validator::make(['image' => $value], [
            $attribute => ValidationRule::requiredIf(function () use ($value) {
                        return $this->model->image === null;
                    }),
        ]);
        return !$validator->fails();

        // Validator::make($value->all(), [
        //     'image' => ValidationRule::requiredIf(function () use ($value) {
        //         return $value->image === null;
        //     }),
        // ]);

        // $validator = Validator::make(['slug' =>$sluggedValue], [
        //     $attribute => ValidationRule::unique($this->table, 'slug')->ignore($this->id)
        // ]);
        // return !$validator->fails();
    }


    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'انتخاب تصویر الزامی است';
    }
}
