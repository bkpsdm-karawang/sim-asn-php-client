<?php

namespace SIM_ASN\Request\Oauth;

use GuzzleHttp\Utils;
use SIM_ASN\Laravel\ServiceProvider;
use SIM_ASN\Models\AccessToken as Model;
use SIM_ASN\Request\Base;

class AccessToken extends Base
{
    /**
     * method of request.
     *
     * @var string
     */
    protected $method = 'POST';

    /**
     * endpoint for request.
     *
     * @var string
     */
    protected $endpoint = '/oauth/token';

    /**
     * generate request body.
     */
    protected function generateRequestBody($body = null): string
    {
        return Utils::jsonEncode([
            'grant_type' => 'authorization_code',
            'client_id' => ServiceProvider::config('client_id'),
            'client_secret' => ServiceProvider::config('client_secret'),
            'redirect_uri' => ServiceProvider::config('user_callback'),
            'scope' => ServiceProvider::config('user_scope'),
            'code' => $body,
        ]);
    }

    /**
     * map data from sim-asn.
     */
    public function mapData(array $data)
    {
        return new Model($data);
    }
}
