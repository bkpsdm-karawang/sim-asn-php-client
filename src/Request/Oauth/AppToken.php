<?php

namespace SIM_ASN\Request\Oauth;

use GuzzleHttp\Utils;

class AppToken extends AccessToken
{
    /**
     * generate request body.
     */
    protected function generateRequestBody($body = null): string
    {
        return Utils::jsonEncode([
            'grant_type' => 'client_credentials',
            'client_id' => $this->localConfig['client_id'],
            'client_secret' => $this->localConfig['client_secret'],
            'scope' => $this->localConfig['app_scope'],
       ]);
    }
}
