<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Location;
use App\Department;
use App\Category;
use App\User;
use App\Supplier;
use App\WorkOrder;
use App\Observers\WorkOrderObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        WorkOrder::observe(WorkOrderObserver::class);
        
        if (! $this->app->runningInConsole()) {

            View::share('locations', Location::select('id','name')->get());

            View::share('departments', Department::select('id','name')->get());

            View::share('categories', Category::select('id','name')->get());

            View::share('suppliers', Supplier::select('id','name')->get());

            View::share('engineers', User::select('id','username')->where('role_id',4)->get());

            $status = ['new','on progress','pending','done'];

            View::share('workordersStatus', collect($status));

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
