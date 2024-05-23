<?php

namespace SIM_ASN\Laravel;

use Illuminate\Support\ServiceProvider as LaravelServiceProvider;
use SIM_ASN\AppClient;
use SIM_ASN\Laravel\Facades\Routes;
use SIM_ASN\OauthClient;
use SIM_ASN\UserClient;

class ServiceProvider extends LaravelServiceProvider
{
    /**
     * config key.
     *
     * @var string
     */
    public const CONFIG_KEY = 'sim-asn';

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->configure();
        $this->createOauthClient();
        $this->createUserClient();
        $this->createAppClient();
        $this->createRouter();
    }

    /**
     * apply configuration.
     */
    protected function configure()
    {
        $path = realpath(__DIR__.'/../config.php');

        $this->mergeConfigFrom($path, static::CONFIG_KEY);
    }

    /**
     * Helper to get the config values.
     *
     * @param string $key
     * @param string $default
     */
    public static function config($key = null, $default = null)
    {
        if ($key) {
            return config(static::CONFIG_KEY.'.'.$key, $default);
        }

        return config(static::CONFIG_KEY);
    }

    /**
     * create oauth client.
     */
    protected function createOauthClient()
    {
        $this->app->singleton(OauthClient::class, function () {
            return new OauthClient();
        });
    }

    /**
     * create app service.
     */
    protected function createUserClient()
    {
        $this->app->singleton(UserClient::class, function () {
            return new UserClient();
        });
    }

    /**
     * create app service.
     */
    protected function createAppClient()
    {
        $this->app->singleton(AppClient::class, function () {
            return new AppClient();
        });
    }

    /**
     * create proxy route.
     */
    protected function createRouter()
    {
        $this->app->bind(Router::class, function ($app) {
            return new Router($app->make('router'));
        });
    }

    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $configPath = realpath(__DIR__.'/../config.php');
            $this->publishes([$configPath => config_path(static::CONFIG_KEY.'.php')], 'config');
        }

        if (static::config('route_proxy_auto')) {
            Routes::routes();
        }
    }
}
