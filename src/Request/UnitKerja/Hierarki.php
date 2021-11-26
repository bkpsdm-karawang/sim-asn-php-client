<?php

namespace SIM_ASN\Request\UnitKerja;

use SIM_ASN\Models\Jabatan;

class Hierarki extends BaseListing
{
    /**
     * Access token.
     *
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model = Jabatan::class;

    /**
     * endpoint for request.
     *
     * @var string
     */
    protected $endpoint = '/api/skpd/{id}/unit_kerja/{unitId}/hierarki';
}
