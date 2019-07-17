<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use View;
use App\Category;
use App\Archives;
use App\Tag;
use App\Posts;
use Auth;
use App\User;
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
        View::share("tags",Tag::getAllToPost());
        View::share("popular",Posts::getItemsPopular());

         //compose all the views....
        view()->composer('*', function ($view)
        {
            if(Auth::guard('user')->check()){
                $id = Auth::guard('user')->user()->id;
                $user = User::getItemById($id);
            }else{
                $user = (object)['id'=>null];
            }

            //...with this variable
            $view->with('userLogin', $user );
        });

    }
}
