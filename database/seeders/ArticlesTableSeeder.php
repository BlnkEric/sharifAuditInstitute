<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Image;
use App\Models\Industry;
use App\Models\Service;
use Illuminate\Database\Seeder;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $industries = Industry::get();
        $services = Service::get();
        $articles = Article::factory(20)->create();
        $articles->each(function($article) use ($industries, $services) {
            $article->industry_id = $industries->random(1)->first()->id;
            $article->service_id = $services->random(1)->first()->id;
            $article->image()->save(Image::make([
                'path' => 'seed'
            ]));
        });
    }
}
