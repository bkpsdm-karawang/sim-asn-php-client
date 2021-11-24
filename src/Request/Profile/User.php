<?php

namespace SIM_ASN\Request\Profile;

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
     * map object from sim-asn.
     */
    public function mapObject(array $data)
    {
        return new Model($data);
    }
}
