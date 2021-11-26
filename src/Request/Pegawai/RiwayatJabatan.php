<?php

namespace SIM_ASN\Request\Pegawai;

use SIM_ASN\Models\Jabatan;

class RiwayatJabatan extends BaseListing
{
    /**
     * Access token.
     *
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model = Jabatan::class;

    /**
     * endpoint for request.
     *
     * @var string
     */
    protected $endpoint = '/api/pegawai/{id}/riwayat_jabatan';
}
