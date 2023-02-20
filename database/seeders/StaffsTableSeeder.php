<?php

namespace Database\Seeders;

use App\Models\Service;
use App\Models\Staff;
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
        $staffs = Staff::factory(count($names))->make();
        $services = Service::get();
        $i = 0;
        foreach($staffs as $staff) {
            $staff->name = $names[$i++];
            $staff->role = $roles->random(1)->first();
            $staff->service_id = $services->random(1)->first()->id;
            $staff->save();
        }
    }
}
