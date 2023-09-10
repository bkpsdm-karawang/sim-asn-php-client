<?php

namespace SIM_ASN\Request\Profile;

use SIM_ASN\Models\Sertifikasi;
use SIM_ASN\Request\BaseListing;

class RiwayatSertifikasi extends BaseListing
{
    /**
     * Access token.
     *
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model = Sertifikasi::class;

    /**
     * endpoint for request.
     *
     * @var string
     */
    protected $endpoint = '/api/me/pegawai/riwayat_sertifikasi';
}
