<?php

namespace SIM_ASN;

/**
 * @method static \SIM_ASN\UserClient getProfile(): \SIM_ASN\Resource\User
 */
class UserClient extends Client
{
    /**
     * requests
     *
     * @var array
     */
    protected $requests = [
        'getProfile' => \SIM_ASN\Request\User\Profile::class
    ];
}
