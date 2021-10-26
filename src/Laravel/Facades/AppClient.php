<?php

namespace SIM_ASN\Laravel\Facades;

use Illuminate\Support\Facades\Facade;
use SIM_ASN\AppClient as Concret;

/**
 * @method static \SIM_ASN\Oauth getToken(string $code = null)
 * @method static \SIM_ASN\Oauth getUser(\SIM_ASN\Resources\AccessToken $acessToken) \SIM_ASN\Resources\User
 * @method static \SIM_ASN\Oauth handleCallback(\Illuminate\Http\Request $request) (\Illuminate\Http\RedirectResponse
 *
 * @see \SIM_ASN\Oauth
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
