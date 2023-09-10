<?php

namespace SIM_ASN\Request\Pegawai;

use SIM_ASN\Models\Skp;

class RiwayatSkp extends BaseListing
{
    /**
     * Access token.
     *
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model = Skp::class;

    /**
     * endpoint for request.
     *
     * @var string
     */
    protected $endpoint = '/api/pegawai/{id}/riwayat_skp';
}
