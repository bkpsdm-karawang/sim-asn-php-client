<?php

namespace SIM_ASN\Request\Profile;

use SIM_ASN\Models\Pendidikan;
use SIM_ASN\Request\BaseListing;

class RiwayatPendidikan extends BaseListing
{
    /**
     * Access token.
     *
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model = Pendidikan::class;

    /**
     * endpoint for request.
     *
     * @var string
     */
    protected $endpoint = '/api/me/pegawai/riwayat_pendidikan';
}
