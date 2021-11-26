<?php

namespace SIM_ASN\Request\UnitKerja;

use SIM_ASN\Models\UnitKerja;

class Detail extends BaseDetail
{
    /**
     * Access token.
     *
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model = UnitKerja::class;

    /**
     * endpoint for request.
     *
     * @var string
     */
    protected $endpoint = '/api/skpd/{id}/unit_kerja/{unitId}';
}
