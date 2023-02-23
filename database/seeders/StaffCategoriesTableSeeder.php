<?php

namespace Database\Seeders;

use App\Models\StaffCategory;
use Illuminate\Database\Seeder;

class StaffCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = [
            'شرکای ارشد' =>1,
            'سایر شرکا'=>2,
            'مدیران خدمات حسابرسی'=>3,
            'سایر مدیران و سرپرستان'=>4
        ];
        foreach($names as $name=>$priority) {
            StaffCategory::create([
                'name' => $name,
                'priority' => $priority
            ]);
        }
    }
}
