<?php

namespace SIM_ASN\Request\Profile;

use SIM_ASN\Models\Inovasi;
use SIM_ASN\Request\BaseListing;

class RiwayatInovasi extends BaseListing
{
    /**
     * Access token.
     *
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model = Inovasi::class;

    /**
     * endpoint for request.
     *
     * @var string
     */
    protected $endpoint = '/api/me/pegawai/riwayat_inovasi';
}
