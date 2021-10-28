<?php

namespace SIM_ASN\Request\Profile;

use SIM_ASN\Request\Base;
use SIM_ASN\Resource\User as Model;

class User extends Base
{
    /**
     * endpoint for request.
     *
     * @var string
     */
    protected $endpoint = '/api/me';

    /**
     * map data from sim-asn.
     */
    public function mapData(array $data)
    {
        return new Model($data);
    }
}
