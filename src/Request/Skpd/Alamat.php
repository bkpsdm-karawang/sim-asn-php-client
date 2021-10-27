<?php

namespace SIM_ASN\Request\Skpd;

use SIM_ASN\Request\BaseDetail;

class Alamat extends BaseDetail
{
    /**
     * endpoint for request.
     *
     * @var string
     */
    protected $endpoint = '/api/skpd/{id}/alamat';
}
