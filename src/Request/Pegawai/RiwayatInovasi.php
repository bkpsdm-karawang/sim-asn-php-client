<?php

namespace SIM_ASN\Request\Pegawai;

use SIM_ASN\Models\Inovasi;

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
    protected $endpoint = '/api/pegawai/{id}/riwayat_inovasi';
}
