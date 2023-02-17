<?php

namespace Database\Seeders;

use App\Models\Industry;
use App\Models\Proposal;
use App\Models\Service;
use App\Models\User;
use Illuminate\Database\Seeder;

class ProposalsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::get();
        $industries = Industry::get();
        $services = Service::get();
        $proposals  = Proposal::factory(5)->make();

        foreach($proposals as $proposal) {
            
            $proposal->slug = $this->make_slug($proposal->name);
            $proposal->user_id = $user->random(1)->first()->id;
            $proposal->industry_id = $industries->random(1)->first()->id;
            $proposal->service_id = $services->random(1)->first()->id;
            $proposal->save();
        }
    }

    private function make_slug($string, $separator = '-') {
        // $string = is_null(request()->slug) ? request()->name : request()->slug;
        $string = trim($string);
        $string = mb_strtolower($string, "UTF-8");;
        $string = preg_replace("/[^\w_\sءاآؤئبپتثجچحخدذرزژسشصضطظعغفقكکگلمنوهی]#u/", '', $string);
        $string = preg_replace("/[\s-]+/", " ", $string);
        $string = preg_replace("/[\s_]/", $separator, $string);
        return $string;
    }
}
