<?php

namespace SIM_ASN\Laravel\Facades;

use Illuminate\Support\Facades\Facade;
use SIM_ASN\AppClient as Concret;

/**
 * @method static \SIM_ASN\Client                     module(string $name, bool $castField = true)
 * @method static \SIM_ASN\Modules\User               user(bool $castField = true)
 * @method static \SIM_ASN\Modules\Pegawai            pegawai(bool $castField = true)
 * @method static \SIM_ASN\Modules\Skpd               skpd(bool $castField = true)
 * @method static \SIM_ASN\Modules\UnitKerja          unitKerja(bool $castField = true)
 * @method static \SIM_ASN\Modules\Sotk               sotk(bool $castField = true)
 * @method static \SIM_ASN\Models\AccessToken         getAccessToken()
 * @method static self                                setCastField(bool $castField)
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
