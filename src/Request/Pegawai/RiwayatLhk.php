<?php

namespace SIM_ASN\Request\Pegawai;

use SIM_ASN\Models\Lhk;

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
    protected $endpoint = '/api/pegawai/{id}/riwayat_lhk';
}
