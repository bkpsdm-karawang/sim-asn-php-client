<?php

namespace SIM_ASN\Request\Pegawai;

use SIM_ASN\Models\Alamat as Model;

class Alamat extends BaseListing
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
    protected $endpoint = '/api/pegawai/{id}/alamat';
}
