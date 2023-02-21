<?php

namespace App\Providers;

use Validator;
use Illuminate\Support\Str;
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

        Validator::extend('per_phone', function($attribute, $value, $parameters) {
            return (substr($value, 0, 3) == '+98' and Str::length(substr($value, 3)) == 10) 
                    or (substr($value, 0, 2) == '09' and Str::length(substr($value, 2)) == 9);
        });

    }
}
