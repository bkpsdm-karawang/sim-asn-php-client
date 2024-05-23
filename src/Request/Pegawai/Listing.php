<?php

namespace SIM_ASN\Request\Pegawai;

use SIM_ASN\Models\Pegawai;
use SIM_ASN\Request\BaseListing;

class Listing extends BaseListing
{
    /**
     * Access token.
     *
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model = Pegawai::class;

    /**
     * endpoint for request.
     *
     * @var string
     */
    protected $endpoint = '/api/pegawai';
}
