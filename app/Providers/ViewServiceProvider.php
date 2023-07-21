<?php

namespace App\Providers;
use App\View\Composers\ViewComposer;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades;
use Illuminate\view\View;
use App\Models\User;
Use App\Models\Backend\Ui;
use App\Models\Backend\Order;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View()->composer('*', function (View $view) {
              
              $view->with('user', User::where('roles','admin')->get());
        });
         
        View()->composer('*',function(View $view)
        {
            $view->with('ui', Ui::first());
        });
    
    }
}
