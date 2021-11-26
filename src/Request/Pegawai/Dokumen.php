<?php

namespace SIM_ASN\Request\Pegawai;

use SIM_ASN\Models\Dokumen as Model;

class Dokumen extends BaseListing
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
    protected $endpoint = '/api/pegawai/{id}/dokumen';
}
