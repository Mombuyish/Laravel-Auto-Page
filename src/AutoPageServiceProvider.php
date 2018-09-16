<?php

namespace Yish\AutoPage;

use Illuminate\Support\ServiceProvider;

class AutoPageServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/config/auto-page.php' => config_path('auto-page.php'),
        ], 'config');
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->loadRoutesFrom(__DIR__ . '/routes/pages.php');
    }
}
