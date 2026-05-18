<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;
use App\Models\Menu;
use App\Models\Setting;
use App\Models\Slider;

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
    public function boot()
    {
        if (config('app.env') !== 'local') {
            URL::forceScheme('https');
        }

        try {
            View::composer('*', function ($view) {
                $primaryMenu = Menu::with('items.children')->where('location', 'primary')->first();
                $globalSettings = Setting::pluck('value', 'key')->toArray();
                $sidebarSlider = Slider::with('items')->where('slug', 'sidebar')->first();

                $view->with('primaryMenu', $primaryMenu)
                     ->with('globalSettings', $globalSettings)
                     ->with('sidebarSlider', $sidebarSlider);
            });
        } catch (\Exception $e) {
            // Ignore if DB not migrated yet
        }
    }
}
