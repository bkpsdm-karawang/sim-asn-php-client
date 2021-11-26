<?php

namespace SIM_ASN\Request\Oauth;

use GuzzleHttp\Utils;
use SIM_ASN\Request\Base;
use SIM_ASN\Models\AccessToken as Model;

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
            'client_id' => $this->localConfig['client_id'],
            'client_secret' => $this->localConfig['client_secret'],
            'redirect_uri' => $this->localConfig['user_callback'],
            'scope' => $this->localConfig['user_scope'],
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
