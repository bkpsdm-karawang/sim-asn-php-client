<?php

namespace SIM_ASN\Request\Profile;

use SIM_ASN\Models\Diklat;
use SIM_ASN\Request\BaseListing;

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
    protected $endpoint = '/api/me/pegawai/riwayat_diklat';
}
