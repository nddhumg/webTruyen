<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        View::addNamespace('admin', resource_path('views/admin'));
        View::addNamespace('adminCommic', resource_path('views/admin/commics'));
        View::addNamespace('adminUser', resource_path('views/admin/user'));
        View::addNamespace('adminGenre', resource_path('views/admin/genre'));
    }
}
