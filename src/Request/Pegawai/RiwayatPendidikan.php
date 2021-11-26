<?php

namespace SIM_ASN\Request\Pegawai;

use SIM_ASN\Models\Pendidikan;

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
    protected $endpoint = '/api/pegawai/{id}/riwayat_pendidikan';
}
