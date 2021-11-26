<?php

namespace SIM_ASN\Request\Skpd;

use SIM_ASN\Models\Jabatan;

class Hierarki extends BaseListing
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
    protected $endpoint = '/api/skpd/{id}/hierarki';
}
