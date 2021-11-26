<?php

namespace SIM_ASN\Request;

use SIM_ASN\Models\AccessToken;

class Get extends Base
{
    /**
     * constructor.
     */
    public function __construct(array $localConfig = [], AccessToken $accessToken = null, $url = null, array $query = [])
    {
        $this->endpoint = $url;

        parent::__construct($localConfig, $accessToken, null, $query);
    }
}
