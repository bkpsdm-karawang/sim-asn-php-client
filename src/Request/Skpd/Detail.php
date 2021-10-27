<?php

namespace SIM_ASN\Request\Skpd;

use SIM_ASN\Request\BaseDetail;
use SIM_ASN\Resource\Skpd;

class Detail extends BaseDetail
{
    /**
     * endpoint for request.
     *
     * @var string
     */
    protected $endpoint = '/api/skpd/{id}';

    /**
     * map object from sim-asn.
     */
    public function mapObject(array $data)
    {
        return new Skpd($data);
    }
}
