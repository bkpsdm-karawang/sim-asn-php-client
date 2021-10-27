<?php

namespace SIM_ASN\Request;

use SIM_ASN\Resource\AccessToken;

abstract class BaseDetail extends Base
{
    /**
     * constructor.
     */
    public function __construct(array $localConfig = [], AccessToken $accessToken = null, $identifier, array $query = [])
    {
        $this->endpoint = $this->endpoint .= '/' . $identifier;

        parent::__construct($localConfig, $accessToken, null, $query);
    }
}
