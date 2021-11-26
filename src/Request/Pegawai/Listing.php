<?php

namespace SIM_ASN\Request\Pegawai;

use SIM_ASN\Request\BaseListing;
use SIM_ASN\Models\Pegawai;

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
