<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Industry;
use App\Models\Proposal;
use App\Models\User;
use Illuminate\Database\Seeder;

class IndustriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = [
            'بانکها و موسسات اعتباری', 
            'شرکتهای لیزینگ', 
            'هلدینگ ها', 
            'بیمه و شرکت های سرمایه گذاری',
            'نهادهای مالی',
            'حمل و نقل'
        ];

        $industries = Industry::factory(5)->make();
        $i = 0;
        foreach($industries as $industry) {
            $industry->name = $names[$i++];
            $industry->save();
            $industry->image()->save(Image::make([
                'path' => 'seed'
            ]));
        }
    }
}
