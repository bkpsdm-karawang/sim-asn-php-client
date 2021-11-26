<?php

namespace SIM_ASN\Request\Pegawai;

use SIM_ASN\Models\Keluarga as Model;

class Keluarga extends BaseListing
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
    protected $endpoint = '/api/pegawai/{id}/keluarga';
}
