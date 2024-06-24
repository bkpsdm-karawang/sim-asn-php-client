<?php

namespace SIM_ASN\Request\Profile;

use SIM_ASN\Request\BaseListing;

class Completeness extends BaseListing
{
    /**
     * endpoint for request.
     *
     * @var string
     */
    protected $endpoint = '/api/me/pegawai/completeness';

    /**
     * map data from sim-asn.
     */
    public function mapData(array $data)
    {
        return $data;
    }
}
