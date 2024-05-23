<?php

namespace SIM_ASN\Request\Oauth;

use GuzzleHttp\Utils;
use SIM_ASN\Laravel\ServiceProvider;

class RefreshToken extends AccessToken
{
    /**
     * generate request body.
     */
    protected function generateRequestBody($body = null): string
    {
        return Utils::jsonEncode([
            'grant_type' => 'refresh_token',
            'client_id' => ServiceProvider::config('client_id'),
            'client_secret' => ServiceProvider::config('client_secret'),
            'redirect_uri' => ServiceProvider::config('user_callback'),
            'scope' => ServiceProvider::config('user_scope'),
            'refresh_token' => $body,
        ]);
    }
}
