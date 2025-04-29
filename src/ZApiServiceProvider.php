<?php

namespace NotificationChannels\ZApi;

use Illuminate\Support\ServiceProvider;
use Saade\ZApi\ZApi;

class ZApiServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $this->app->when(ZApiChannel::class)
            ->needs(ZApi::class)
            ->give(function () {
                return ZApi::instance();
            });
    }

    /**
     * Register the application services.
     */
    public function register()
    {
    }
}
