<?php

namespace SIM_ASN\Models;

use SIM_ASN\Laravel\Facades\OauthClient;

class AccessToken extends Base
{
    /**
     * refresh.
     */
    public function refresh(): AccessToken
    {
        return OauthClient::requestRefreshToken($this->refresh_token);
    }
}
