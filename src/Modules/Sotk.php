<?php

namespace SIM_ASN\Modules;

use SIM_ASN\Client;
use SIM_ASN\Resource\AccessToken;

/**
 * @method mixed getRequest($url, array $query = [])
 */
class Sotk extends Client
{
    /**
     * constructor.
     *
     * @param ClientInterface $client
     *
     * @return void
     */
    public function __construct(AccessToken $accessToken = null, array $localConfig = [])
    {
        $localConfig['url'] .= '/api/sotk/';

        parent::__construct($accessToken, $localConfig);
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
