<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;

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

        View::composer(
            [
                'admin.index',
                'admin.users.approval',
                'admin.users.all',
                'admin.users.deleted',
                'admin.profile'
            ],
            'App\Http\View\Composers\AdminNotificationComposer'
        );
    }
}
