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
        $proposals  = Proposal::factory(20)->make();
        foreach($proposals as $proposal) {
            $proposal->user_id = $user->random(1)->first()->id;
            $proposal->industry_id = $industries->random(1)->first()->id;
            $proposal->service_id = $services->random(1)->first()->id;
            $proposal->save();
        }
    }
}
