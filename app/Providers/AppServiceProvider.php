<?php

namespace App\Providers;

use App\Models\services\Service;
use App\Models\locations\Location;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\PageController;
use Illuminate\Support\ServiceProvider;
// use Illuminate\View\View;

class AppServiceProvider extends ServiceProvider
{

    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer(['layout_page'], function ($view) {

            $view->with([
                'services' => Service::select()->where('activation', '=', '1')->paginate(10),
                'locations' => Location::select()->where('activation', '=', '1')->paginate(10)
            ]);
        });
    }
}
