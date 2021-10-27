<?php

namespace SIM_ASN\Laravel\Facades;

use Illuminate\Support\Facades\Facade;
use SIM_ASN\AppClient as Concret;

/**
 * @method static \SIM_ASN\Client module(string $name)
 * @method static \SIM_ASN\Modules\User user()
 * @method static \SIM_ASN\Modules\Pegawai pegawai()
 */
class AppClient extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return Concret::class;
    }
}
