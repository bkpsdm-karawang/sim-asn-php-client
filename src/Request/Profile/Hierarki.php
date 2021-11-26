<?php

namespace SIM_ASN\Request\Profile;

use SIM_ASN\Models\Hierarki as Model;
use SIM_ASN\Request\Base;

class Hierarki extends Base
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
    protected $endpoint = '/api/me/pegawai/hierarki';
}
