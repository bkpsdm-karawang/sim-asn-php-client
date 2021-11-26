<?php

namespace SIM_ASN\Request\Pegawai;

use SIM_ASN\Models\Diklat;

class RiwayatDiklat extends BaseListing
{
    /**
     * Access token.
     *
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model = Diklat::class;

    /**
     * endpoint for request.
     *
     * @var string
     */
    protected $endpoint = '/api/pegawai/{id}/riwayat_diklat';
}
