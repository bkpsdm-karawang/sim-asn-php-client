<?php

namespace SIM_ASN\Request\User;

use SIM_ASN\Request\BaseDetail;
use SIM_ASN\Resource\User;

class Detail extends BaseDetail
{
    /**
     * endpoint for request.
     *
     * @var string
     */
    protected $endpoint = '/api/user';

    /**
     * map object from sim-asn.
     */
    public function mapObject(array $data)
    {
        return new User($data);
    }
}
