<?php

namespace App\Providers;

use App\Models\Article;
use App\Models\Industry;
use App\Models\Service;
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
        view()->share([
            'NavServices'=> $NavServices,
            'NavIndustries'=> $NavIndustries,
            'NavArticles'=> $NavArticles,
        ]);
    }
}
