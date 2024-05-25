<?php

namespace SIM_ASN\Laravel\Facades;

use Illuminate\Support\Facades\Facade;
use SIM_ASN\AppClient as Concret;

/**
 * @method static \SIM_ASN\Client                     module(string $name)
 * @method static \SIM_ASN\Modules\User               user()
 * @method static \SIM_ASN\Modules\Pegawai            pegawai()
 * @method static \SIM_ASN\Modules\Skpd               skpd()
 * @method static \SIM_ASN\Modules\UnitKerja          unitKerja()
 * @method static \SIM_ASN\Modules\Sotk               sotk()
 * @method static \SIM_ASN\Models\AccessToken         getAccessToken()
 * @method static \Psr\Http\Message\ResponseInterface get($uri, array $options = [])
 * @method static \Psr\Http\Message\ResponseInterface head($uri, array $options = [])
 * @method static \Psr\Http\Message\ResponseInterface post($uri, array $options = [])
 * @method static \Psr\Http\Message\ResponseInterface patch($uri, array $options = [])
 * @method static \Psr\Http\Message\ResponseInterface put($uri, array $options = [])
 * @method static \Psr\Http\Message\ResponseInterface delete($uri, array $options = [])
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
