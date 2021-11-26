<?php

namespace SIM_ASN\Request\Skpd;

use SIM_ASN\Models\Skpd;
use SIM_ASN\Request\BaseDetail;

class Detail extends BaseDetail
{
    /**
     * Access token.
     *
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model = Skpd::class;

    /**
     * endpoint for request.
     *
     * @var string
     */
    protected $endpoint = '/api/skpd/{id}';
}
