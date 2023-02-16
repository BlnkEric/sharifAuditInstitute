<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = [
            'حسابرسی مستقل و اعتباردهی',
            'خدمات مالی و مالیاتی',
            'خدمات مدیریت و حسابرسی داخلی',
            'متولی گری و حسابرسی صندوق های سرمایه گذاری و امین سبدگردان'
        ];

        $services = Service::factory(4)->make();
        $i = 0;
        foreach($services as $service) {
            $service->name = $names[$i++];
            $service->save();
        }
    }
}
