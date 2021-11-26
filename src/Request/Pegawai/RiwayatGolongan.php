<?php

namespace SIM_ASN\Request\Pegawai;

use SIM_ASN\Models\Golongan;

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
    protected $endpoint = '/api/pegawai/{id}/riwayat_golongan';
}
