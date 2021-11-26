<?php

namespace SIM_ASN\Request\Profile;

use SIM_ASN\Models\Jabatan;
use SIM_ASN\Request\BaseListing;

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
    protected $endpoint = '/api/me/pegawai/riwayat_jabatan';
}
