<?php

namespace Database\Seeders;

use App\Models\Tag;
use App\Models\Image;
use App\Models\JobOffer;
use Illuminate\Database\Seeder;

class JobOfferTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = [
            'حسابدار ارشد',
            'نیروی خدمات مالی و مالیاتی',
            'کارآموز حسابداری',
            'دستیار مدیر عامل',
            'منشی دفتر',
        ];

        $jobOffers = JobOffer::factory(5)->make();
        $i = 0;
        foreach($jobOffers as $jobOffer) {
            $jobOffer->name = $names[$i++];
            $jobOffer->save();
            $jobOffer->image()->save(Image::make([
                'path' => 'seed'
            ]));
        }
        
        $tagCount = Tag::all()->count();

        if (0 === $tagCount) {
            $this->command->info('No tags found, skipping assigning tags to blog posts');
            return;
        }

        $howManyMin = (int)$this->command->ask('Minimum tags on jobOffer?', 0);
        $howManyMax = min((int)$this->command->ask('Maximum tags on jobOffer?', $tagCount), $tagCount);

        JobOffer::all()->each(function (JobOffer $jobOffer) use($howManyMin, $howManyMax) {
            $take = random_int($howManyMin, $howManyMax);
            $tags = Tag::inRandomOrder()->take($take)->get()->pluck('id');
            $jobOffer->tags()->sync($tags);
        });
    }
}
