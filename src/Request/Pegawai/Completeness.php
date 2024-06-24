<?php

namespace SIM_ASN\Request\Pegawai;

class Completeness extends BaseListing
{
    /**
     * endpoint for request.
     *
     * @var string
     */
    protected $endpoint = '/api/pegawai/{id}/completeness';

    /**
     * map data from sim-asn.
     */
    public function mapData(array $data)
    {
        return $data;
    }
}
