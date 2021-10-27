<?php

namespace SIM_ASN\Laravel;

use SIM_ASN\ConfigTrait;

class Router
{
    use ConfigTrait;

    /**
     * router
     */
    protected $router;

    /**
     * constructor.
     *
     * @return void
     */
    public function __construct($router, array $localConfig = [])
    {
        $this->router = $router;
        $this->configureLocal($localConfig);
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

        $routeOptions = [
            'namespace' => '\SIM_ASN\Laravel\Http\Controllers',
        ];

        if (isset($this->localConfig['route_proxy_prefix'])) {
            $routeOptions['prefix'] = $this->localConfig['route_proxy_prefix'];
        }

        if (isset($this->localConfig['route_proxy_middleware'])) {
            $routeOptions['middleware'] = $this->localConfig['route_proxy_middleware'];
        }

        $options = array_merge($routeOptions, $options);

        $this->router->group($options, function ($router) use ($callback) {
            $callback(new RouteRegistrar($router));
        });
    }
}
