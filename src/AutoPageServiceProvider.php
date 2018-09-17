<?php

namespace Yish\AutoPage;

use App\Providers\RouteServiceProvider;

class AutoPageServiceProvider extends RouteServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        $this->publishes([
            __DIR__ . '/config/auto-page.php' => config_path('auto-page.php'),
        ], 'config');
    }

    public function map()
    {
        parent::map();

        $this->loadRoutesFrom(__DIR__ . '/routes/pages.php');
    }
}
