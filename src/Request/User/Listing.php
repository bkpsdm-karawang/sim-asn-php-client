<?php

namespace SIM_ASN\Request\User;

use SIM_ASN\Request\BaseListing;
use SIM_ASN\Resource\User;

class Listing extends BaseListing
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