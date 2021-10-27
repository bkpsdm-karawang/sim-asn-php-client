<?php

namespace SIM_ASN\Request\Pegawai;

use SIM_ASN\Request\BaseListing;
use SIM_ASN\Resource\Pegawai;

class Listing extends BaseListing
{
    /**
     * endpoint for request.
     *
     * @var string
     */
    protected $endpoint = '/api/pegawai';

    /**
     * map object from sim-asn.
     */
    public function mapObject(array $data)
    {
        return new Pegawai($data);
    }
}
