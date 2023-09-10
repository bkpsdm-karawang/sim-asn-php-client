<?php

namespace SIM_ASN\Request\Pegawai;

use SIM_ASN\Models\Sertifikasi;

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
    protected $endpoint = '/api/pegawai/{id}/riwayat_sertifikasi';
}
