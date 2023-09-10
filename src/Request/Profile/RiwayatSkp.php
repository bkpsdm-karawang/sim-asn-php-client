<?php

namespace SIM_ASN\Request\Profile;

use SIM_ASN\Models\Skp;
use SIM_ASN\Request\BaseListing;

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
    protected $endpoint = '/api/me/pegawai/riwayat_skp';
}
