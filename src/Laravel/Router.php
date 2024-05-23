<?php

namespace SIM_ASN\Laravel;

class Router
{
    /**
     * router.
     */
    protected $router;

    /**
     * constructor.
     *
     * @return void
     */
    public function __construct($router)
    {
        $this->router = $router;
    }

    /**
     * Binds the SOTK routes into the controller.
     *
     * @param callable|null $callback
     *
     * @return void
     */
    public function routes($callback = null, array $options = [])
    {
        $callback = $callback ?: function ($router) {
            $router->all();
        };

        $options = array_merge([
            'namespace' => '\SIM_ASN\Laravel\Http\Controllers',
            'prefix' => ServiceProvider::config('route_proxy_prefix'),
            'middleware' => ServiceProvider::config('route_proxy_middleware'),
        ], $options);

        $this->router->group($options, function ($router) use ($callback) {
            $callback(new RouteRegistrar($router));
        });
    }
}
