<?php

namespace SIM_ASN\Laravel\Facades;

use Illuminate\Support\Facades\Facade;
use SIM_ASN\Laravel\Router;

/**
 * @method static void routes($callback = null, array $options = [])
 */
class Routes extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return Router::class;
    }
}
