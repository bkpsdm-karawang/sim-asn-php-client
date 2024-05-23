<?php

namespace SIM_ASN\Request\Oauth;

use GuzzleHttp\Utils;
use SIM_ASN\Laravel\ServiceProvider;

class AppToken extends AccessToken
{
    /**
     * generate request body.
     */
    protected function generateRequestBody($body = null): string
    {
        return Utils::jsonEncode([
            'grant_type' => 'client_credentials',
            'client_id' => ServiceProvider::config('client_id'),
            'client_secret' => ServiceProvider::config('client_secret'),
            'scope' => ServiceProvider::config('app_scope'),
        ]);
    }
}
