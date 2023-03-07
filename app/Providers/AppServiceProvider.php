<?php

namespace App\Providers;

use App\Models\Image;
use App\Models\Article;
use App\Models\Service;
use App\Models\Industry;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        $NavServices = Service::all();
        $NavServices->load(['specialServices']);
        $NavIndustries = Industry::all();
        $NavArticles = Article::all();
        $GalleryImages = Image::inRandomOrder()->take(5)->get();
        $mostRecentArticle = Article::orderBy('created_at')->first();
        view()->share([
            'NavServices'=> $NavServices,
            'NavIndustries'=> $NavIndustries,
            'NavArticles'=> $NavArticles,
            'mostRecentArticle'=> $mostRecentArticle,
            'GalleryImages'=> $GalleryImages,
        ]);
    }
}
