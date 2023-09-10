<?php

namespace SIM_ASN\Request\Profile;

use SIM_ASN\Models\Lhk;
use SIM_ASN\Request\BaseListing;

class RiwayatLhk extends BaseListing
{
    /**
     * Access token.
     *
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model = Lhk::class;

    /**
     * endpoint for request.
     *
     * @var string
     */
    protected $endpoint = '/api/me/pegawai/riwayat_lhk';
}
