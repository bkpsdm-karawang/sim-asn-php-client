<?php

namespace SIM_ASN\Request\UnitKerja;

class Alamat extends BaseDetail
{
    /**
     * endpoint for request.
     *
     * @var string
     */
    protected $endpoint = '/api/skpd/{id}/unit_kerja/{unitId}/alamat';
}
