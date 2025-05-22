<?php

namespace SIM_ASN\Request\Pegawai;

use SIM_ASN\Models\Pak;

class RiwayatPak extends BaseListing
{
    /**
     * Access token.
     *
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model = Pak::class;

    /**
     * endpoint for request.
     *
     * @var string
     */
    protected $endpoint = '/api/pegawai/{id}/riwayat_pak';
}
