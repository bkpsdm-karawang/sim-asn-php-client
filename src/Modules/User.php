<?php

namespace SIM_ASN\Modules;

use SIM_ASN\Client;

/**
 * @method \Illuminate\Pagination\LengthAwarePaginator getList(array $query = [])
 * @method \SIM_ASN\Models\User getDetail($id)
 */
class User extends Client
{
    /**
     * requests.
     *
     * @var array
     */
    protected $requests = [
        'getList' => \SIM_ASN\Request\User\Listing::class,
        'getDetail' => \SIM_ASN\Request\User\Detail::class,
    ];
}
