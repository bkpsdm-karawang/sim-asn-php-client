<?php

namespace SIM_ASN\Request\Oauth;

use GuzzleHttp\Utils;

class RefreshToken extends AccessToken
{
    /**
     * generate request body.
     */
    protected function generateRequestBody($body = null): string
    {
        return Utils::jsonEncode([
            'grant_type' => 'refresh_token',
            'client_id' => $this->localConfig['client_id'],
            'client_secret' => $this->localConfig['client_secret'],
            'redirect_uri' => $this->localConfig['user_callback'],
            'scope' => $this->localConfig['user_scope'],
            'refresh_token' => $body,
        ]);
    }
}
