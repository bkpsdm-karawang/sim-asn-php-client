<?php

namespace SIM_ASN\Request;

use SIM_ASN\Resource\AccessToken;

abstract class BaseDetail extends Base
{
    /**
     * id key
     */
    protected $idKey = '{id}';

    /**
     * constructor.
     */
    public function __construct(array $localConfig = [], AccessToken $accessToken = null, $identifier, array $query = [])
    {
        $this->endpoint = str_replace($this->idKey, $identifier, $this->endpoint);

        parent::__construct($localConfig, $accessToken, null, $query);
    }
}
