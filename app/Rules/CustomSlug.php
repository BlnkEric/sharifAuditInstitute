<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule as ValidationRule;

class CustomSlug implements Rule
{
    private $table, $id;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($table, $id=null)
    {
        $this->table = $table;
        $this->id = $id;
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
        $sluggedValue = $this->make_slug();
        $validator = Validator::make(['slug' =>$sluggedValue], [
            $attribute => ValidationRule::unique($this->table, 'slug')->ignore($this->id)
        ]);
        return !$validator->fails();
    }

    private function make_slug($separator = '-') {
        $string = is_null(request()->slug) ? request()->name : request()->slug;
        $string = trim($string);
        $string = mb_strtolower($string, "UTF-8");;
        $string = preg_replace("/[^\w_\sءاآؤئبپتثجچحخدذرزژسشصضطظعغفقكکگلمنوهی]#u/", '', $string);
        $string = preg_replace("/[\s-]+/", " ", $string);
        $string = preg_replace("/[\s_]/", $separator, $string);
        return $string;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'اسلاگ از قبل استفاده شده است.';
    }
}
