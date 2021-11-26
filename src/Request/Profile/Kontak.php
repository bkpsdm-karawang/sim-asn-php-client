<?php

namespace SIM_ASN\Request\Profile;

use SIM_ASN\Models\Kontak as Model;
use SIM_ASN\Request\BaseListing;

class Kontak extends BaseListing
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
    protected $endpoint = '/api/me/pegawai/kontak';
}
