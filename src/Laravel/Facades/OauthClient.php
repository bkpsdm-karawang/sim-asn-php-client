<?php

namespace SIM_ASN\Laravel\Facades;

use Illuminate\Support\Facades\Facade;
use SIM_ASN\OauthClient as Concret;

/**
 * @method static \SIM_ASN\Resource\AccessToken getAccessToken(string $code = null)
 * @method static \SIM_ASN\Resource\AccessToken getRefreshTokenToken(string $refreshToken = null)
 * @method static \SIM_ASN\Resource\AccessToken getAppToken()
 * @method static \Illuminate\Http\RedirectResponse handleCallback(\Illuminate\Http\Request $request, \Clousure $createToken = null)
 *
 * @see \SIM_ASN\Oauth
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
