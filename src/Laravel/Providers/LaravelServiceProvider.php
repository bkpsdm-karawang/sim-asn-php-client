<?php

namespace SIM_ASN\Laravel\Providers;

use SIM_ASN\Laravel\Facades\Routes;

class LaravelServiceProvider extends AbstractServiceProvider
{
    /**
     * {@inheritdoc}
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $configPath = realpath(__DIR__.'/../../config.php');
            $this->publishes([$configPath => config_path('sim_asn.php')], 'config');
        }

        if ($this->config('route_proxy_enabled') && $this->config('route_proxy_auto')) {
            Routes::routes();
        }
    }
}
