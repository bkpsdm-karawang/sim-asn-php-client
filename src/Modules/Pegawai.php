<?php

namespace SIM_ASN\Modules;

use SIM_ASN\Client;

/**
 * @method mixed getList(array $query = [])
 * @method mixed getDetail($id)
 */
class Pegawai extends Client
{
    /**
     * requests.
     *
     * @var array
     */
    protected $requests = [
        'getList' => \SIM_ASN\Request\Pegawai\Listing::class,
        'getDetail' => \SIM_ASN\Request\Pegawai\Detail::class
    ];
}
