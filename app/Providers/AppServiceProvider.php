<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use View;
use App\Category;
use App\Archives;

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
        Schema::defaultStringLength(190);
        View::share('userUrl', getenv("USER_URL"));
        View::share('adminUrl', getenv("ADMIN_URL"));
        // dd(Category::getAllToPost());
        View::share('categories',Category::getAllToPost());
        View::share('archives',Archives::getAllToPost());
    }
}
