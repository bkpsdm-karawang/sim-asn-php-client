<?php

namespace SIM_ASN\Request\Profile;

use SIM_ASN\Models\Pak;
use SIM_ASN\Request\BaseListing;

class RiwayatPak extends BaseListing
{
    /**
     * Access token.
     *
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model = Pak::class;

    /**
     * endpoint for request.
     *
     * @var string
     */
    protected $endpoint = '/api/me/pegawai/riwayat_pak';
}
