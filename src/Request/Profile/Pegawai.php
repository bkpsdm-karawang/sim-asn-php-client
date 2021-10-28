<?php

namespace SIM_ASN\Request\Profile;

use SIM_ASN\Request\Base;
use SIM_ASN\Resource\Pegawai as Model;

class Pegawai extends Base
{
    /**
     * endpoint for request.
     *
     * @var string
     */
    protected $endpoint = '/api/me/pegawai';

    /**
     * map data from sim-asn.
     */
    public function mapData(array $data)
    {
        return new Model($data);
    }
}
