<?php

namespace SIM_ASN\Request\Pegawai;

use SIM_ASN\Models\RiwayatKeluarga as Model;

class RiwayatKeluarga extends BaseListing
{
    /**
     * Access token.
     *
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model = Model::class;

    /**
     * endpoint for request.
     *
     * @var string
     */
    protected $endpoint = '/api/pegawai/{id}/riwayat_keluarga';
}
