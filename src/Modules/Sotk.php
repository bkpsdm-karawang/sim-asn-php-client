<?php

namespace SIM_ASN\Modules;

use SIM_ASN\Client;
use SIM_ASN\Laravel\ServiceProvider;
use SIM_ASN\Models\AccessToken;

/**
 * @method mixed getRequest($url, array $query = [])
 */
class Sotk extends Client
{
    /**
     * constructor.
     *
     * @return void
     */
    public function __construct(?AccessToken $accessToken = null, ?string $uri = null)
    {
        $uri = config(ServiceProvider::CONFIG_KEY.'.url').'/api/sotk/';

        parent::__construct($accessToken, $uri);
    }

    /**
     * requests.
     *
     * @var array
     */
    protected $requests = [
        'getRequest' => \SIM_ASN\Request\Get::class,
    ];
}
