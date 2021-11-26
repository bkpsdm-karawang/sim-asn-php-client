<?php

namespace SIM_ASN\Request\UnitKerja;

use SIM_ASN\Models\Pegawai;

class Pendidikan extends BaseListing
{
    /**
     * Access token.
     *
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model = Pegawai::class;

    /**
     * endpoint for request.
     *
     * @var string
     */
    protected $endpoint = '/api/skpd/{id}/unit_kerja/{unitId}/pendidikan';
}
