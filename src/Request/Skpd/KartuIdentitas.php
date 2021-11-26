<?php

namespace SIM_ASN\Request\Skpd;

use SIM_ASN\Models\Pegawai;

class KartuIdentitas extends BaseListing
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
    protected $endpoint = '/api/skpd/{id}/kartu_identitas';
}
