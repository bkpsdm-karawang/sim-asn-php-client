<?php

namespace SIM_ASN\Request\Oauth;

use SIM_ASN\Request\Base;
use SIM_ASN\Resource\AccessToken;

class AppToken extends Base
{
    /**
     * method of request
     *
     * @var string
     */
    protected $method = 'POST';

    /**
     * endpoint for request
     *
     * @var string
     */
    protected $endpoint = '/oauth/token';

    /**
     * map data from sim-asn
     */
    public function mapData(array $data)
    {
        return new AccessToken($data);
    }
}
