<?php

namespace SIM_ASN\Request\Pegawai;

use SIM_ASN\Request\BaseDetail;
use SIM_ASN\Resource\Pegawai;

class Detail extends BaseDetail
{
    /**
     * endpoint for request.
     *
     * @var string
     */
    protected $endpoint = '/api/pegawai/{id}';

    /**
     * map object from sim-asn.
     */
    public function mapObject(array $data)
    {
        return new Pegawai($data);
    }
}
