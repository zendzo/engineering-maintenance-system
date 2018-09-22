<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Location;
use App\Department;
use App\Category;
use App\User;
use App\Supplier;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (! $this->app->runningInConsole()) {

            View::share('locations', Location::select('id','name')->get());

            View::share('departments', Department::select('id','name')->get());

            View::share('categories', Category::select('id','name')->get());

            View::share('suppliers', Supplier::select('id','name')->get());

            View::share('engineers', User::select('id','username')->where('role_id',4)->get());

        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
