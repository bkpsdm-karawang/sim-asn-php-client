<?php

namespace SIM_ASN\Laravel\Providers;

use SIM_ASN\Laravel\Facades\Routes;

class LumenServiceProvider extends AbstractServiceProvider
{
    /**
     * {@inheritdoc}
     */
    public function boot()
    {
        if ($this->config('route_proxy_enabled') && $this->config('route_proxy_auto')) {
            Routes::routes();
        }
    }
}
