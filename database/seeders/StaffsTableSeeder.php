<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Industry;
use App\Models\Service;
use App\Models\Staff;
use App\Models\StaffCategory;
use Illuminate\Database\Seeder;

class StaffsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = [
            'شیده مسگر',
            'زند آسایش',
            'آیسان صمیعی',
            'شهریار پارسافر',
            'روژین خامنه ای',
            'سامان ذاکری',
            'فرزاد کوشا',
            'شاپور شاه سیاه',
            'کوشا کاهکش',
            'پیوند کسایی',
            'تورج داوودی',
            'فریبرز محربی',
            'پرنیا بهبهانی'
        ];

        $roles = collect([
            'مدیر عامل، عضو هیئت مدیره',
            'رییس هیئت مدیره',
            'نائب رییس هیئت مدیره',
            'مدیر فنی',
            'مدیر دفتر',
            'مدیر کنترل کیفی'
        ]);
        $staffCategories = StaffCategory::get();
        $staffs = Staff::factory(count($names))->make();
        $industries = Industry::get();
        $i = 0;
        foreach($staffs as $staff) {
            $staff->name = $names[$i++];
            $staff->slug = $this->make_slug($staff->name);
            $staff->staff_category_id = $staffCategories->random(1)->first()->id;
            $staff->role = $roles->random(1)->first();
            $staff->industry_id = $industries->random(1)->first()->id;
            $staff->save();
            $staff->image()->save(Image::make(['path'=>'seed']));
        }
    }

    public function make_slug($string, $separator = '-') {
        $string = trim($string);
        $string = mb_strtolower($string, "UTF-8");;
        $string = preg_replace("/[^\w_\sءاآؤئبپتثجچحخدذرزژسشصضطظعغفقكکگلمنوهی]#u/", '', $string);
        $string = preg_replace("/[\s-]+/", " ", $string);
        $string = preg_replace("/[\s_]/", $separator, $string);
        return $string;
    }
}
