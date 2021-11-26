<?php

namespace SIM_ASN\Request\User;

use SIM_ASN\Request\BaseDetail;
use SIM_ASN\Models\User;

class Detail extends BaseDetail
{
    /**
     * Access token.
     *
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model = User::class;

    /**
     * endpoint for request.
     *
     * @var string
     */
    protected $endpoint = '/api/user/{id}';
}
