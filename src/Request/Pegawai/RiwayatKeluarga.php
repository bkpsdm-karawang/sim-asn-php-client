<?php

namespace SIM_ASN\Request\Pegawai;

use SIM_ASN\Request\BaseDetail;

class RiwayatKeluarga extends BaseDetail
{
    /**
     * endpoint for request.
     *
     * @var string
     */
    protected $endpoint = '/api/pegawai/{id}/riwayat_keluarga';
}