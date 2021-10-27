<?php

namespace SIM_ASN\Laravel\Facades;

use Illuminate\Support\Facades\Facade;
use SIM_ASN\UserClient as Concret;

/**
 * @method static \SIM_ASN\Resource\User getProfile()
 * @method static $this setAccessToken(\SIM_ASN\Resource\AccessToken $accessToken)
 * @method static void onRefreshToken(\Closure $onSave)
 */
class UserClient extends Facade
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
