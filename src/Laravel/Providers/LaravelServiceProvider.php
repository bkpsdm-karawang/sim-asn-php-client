<?php

namespace SIM_ASN\Laravel\Providers;

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
    }
}
