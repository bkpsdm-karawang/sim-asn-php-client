<?php

namespace SIM_ASN\Request\Profile;

use SIM_ASN\Models\Golongan;
use SIM_ASN\Request\BaseListing;

class RiwayatGolongan extends BaseListing
{
    /**
     * Access token.
     *
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model = Golongan::class;

    /**
     * endpoint for request.
     *
     * @var string
     */
    protected $endpoint = '/api/me/pegawai/riwayat_golongan';
}
