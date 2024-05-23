<?php

namespace SIM_ASN\Request\User;

use SIM_ASN\Models\User;
use SIM_ASN\Request\BaseListing;

class Listing extends BaseListing
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
    protected $endpoint = '/api/user';
}
