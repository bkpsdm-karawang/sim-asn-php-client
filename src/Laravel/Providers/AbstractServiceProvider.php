<?php

namespace SIM_ASN\Laravel\Providers;

use Illuminate\Support\ServiceProvider as LaravelServiceProvider;
use SIM_ASN\AppClient;
use SIM_ASN\OauthClient;
use SIM_ASN\UserClient;

abstract class AbstractServiceProvider extends LaravelServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->configure();
        $this->createOauthClient();

        if ($this->config('user_enabled')) {
            $this->createUserClient();
        }

        if ($this->config('app_enabled')) {
            $this->createAppClient();
        }
    }

    /**
     * apply configuration.
     */
    protected function configure()
    {
        if (method_exists($this->app, 'configure')) {
            $this->app->configure('sim_asn');
        }

        $path = realpath(__DIR__.'/../../config.php');
        $this->mergeConfigFrom($path, 'sim_asn');
    }

    /**
     * Helper to get the config values.
     *
     * @param string $key
     * @param string $default
     *
     * @return mixed
     */
    protected function config($key = null, $default = null)
    {
        if ($key) {
            return config("sim_asn.$key", $default);
        }

        return config('sim_asn');
    }

    /**
     * create oauth client.
     */
    protected function createOauthClient()
    {
        $this->app->singleton(OauthClient::class, function () {
            return new OauthClient(null, $this->config());
        });
    }

    /**
     * create app service.
     */
    protected function createUserClient()
    {
        $this->app->singleton(UserClient::class, function () {
            return new UserClient(null, $this->config());
        });
    }

    /**
     * create app service.
     */
    protected function createAppClient()
    {
        $this->app->singleton(AppClient::class, function () {
            return new AppClient(null, $this->config());
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            OauthClient::class,
            UserClient::class,
            AppClient::class,
        ];
    }
}
