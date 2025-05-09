<?php

namespace SIM_ASN\Laravel;

use SIM_ASN\Auth\ServiceGuard;
use SIM_ASN\Auth\UserProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Auth::extend('sim_asn', function ($app, $name, array $config) {
            $provider = Auth::createUserProvider($config['provider']);
            return new ServiceGuard($provider, $app['request']);
        });

        Auth::provider('sim_asn', function () {
            return new UserProvider();
        });
    }
}
