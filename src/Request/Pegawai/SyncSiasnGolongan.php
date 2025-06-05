<?php

namespace SIM_ASN\Request\Pegawai;

use SIM_ASN\Models\Golongan;
use SIM_ASN\Request\BaseDetail;

class SyncSiasnGolongan extends BaseDetail
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
    protected $endpoint = '/api/pegawai/{id}/riwayat_golongan/sync_siasn';
}
