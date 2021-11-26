<?php

namespace SIM_ASN\Request\Pegawai;

use SIM_ASN\Models\Pelanggaran;

class RiwayatPelanggaran extends BaseListing
{
    /**
     * Access token.
     *
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model = Pelanggaran::class;

    /**
     * endpoint for request.
     *
     * @var string
     */
    protected $endpoint = '/api/pegawai/{id}/riwayat_pelanggaran';
}
