<?php

namespace SIM_ASN\Laravel\Facades;

use Illuminate\Support\Facades\Facade;
use SIM_ASN\OauthClient as Concret;

/**
 * @method static \SIM_ASN\Resource\AccessToken requestAccessToken(string $code = null)
 * @method static \SIM_ASN\Resource\AccessToken requestRefreshTokenToken(string $refreshToken = null)
 * @method static \SIM_ASN\Resource\AccessToken requestAppToken()
 * @method static \Illuminate\Http\RedirectResponse handleCallback(\Illuminate\Http\Request $request, \Clousure $createToken = null)
 */
class OauthClient extends Facade
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
